<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;
use App\Models\UserLog;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Submission;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * index
     *  returns users list where superuser can edit add or delete any user (delete everyone exept himself)
     * @return void
     */
    public function index(Request $request){
        $users = User::where('type_id', '!=', 4)->get();
        $notifications = Submission::where('seen', 0)->with('post.parent')->orderBy('created_at', 'desc')->get();
        if($request->filled('search')){
            $users = User::search($request->search)->get();
        }else{
            $users = User::get();
        }
        return view('admin.users.list', compact('users','notifications'));
    }
    /**
     * index
     *  returns users list where superuser can edit add or delete any user (delete everyone exept himself)
     * @return void
     */
    public function logs($id){
        $user = User::find($id);
        $logs = UserLog::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('admin.users.logs', compact(['user', 'logs']));
    }


    /**
     * add
     *  returns user add wiew to add users
     * @return void
     */
    public function create(){
      
        $user_types = Config::get('userTypes');
        $notifications = Submission::where('seen', 0)->with('post.parent')->orderBy('created_at', 'desc')->get();
        return view('admin.users.add', compact(['user_types','notifications']));
    }
    /**
     * store
     * store function stores request form create function
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request){
       
       $values = $request->all();
       
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'email|unique:users|required',
            'type_id' => 'required',
            'password' => 'required_with:re_password|same:re_password|min:8',
            
        ]);
        
        if($request->HasFile('avatar')){
            dd($request);
            $image = $request->file('avatar');
            $imagename = $image->getClientOriginalName();
            $image->storeAs((config('config.image_path')) ,  $imagename);
            $values['image'] = $imagename;
           
        }
       
        $user['name'] = $request->all()['name'];
        $user['email'] = $request->all()['email'];
        $user['type_id'] = $request->all()['type_id'];
        $user['image'] = $values['image'];
       
        $user['password'] = Hash::make($request->all()['password']);
      
       
        
        User::create($user);
        return $this->index();
    }

  
    /**
     * editProfile
     * non superadmin user can edit his profile
     * @return void
     */
    public function editProfile(){
        $user = auth()->user();
        return view('admin.users.edit_profile', compact(['user']));
    }
    /**
     * updateProfile
     *  non superadmin user profile update
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function updateProfile(Request $request){
        $user = auth()->user();

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'email|required|unique:users,email,'.$user->id,
        ]);
        
        $user->name = $request->all()['name'];
        $user->email = $request->all()['email'];
        $user->type_id = $user->type_id;

        if ($request->all()['password'] !== null) {
            $request->validate([
                'password' => 'required_with:re_password|same:re_password|min:8',
            ]);

            $user->password = Hash::make($request->all()['password']);
        }
        $user->save();
        return back();
    }



    /**
     * edit
     * returns user edit view
     * @param  mixed $id
     * @return void
     */
    public function edit($id){
        $user = User::find($id);
        $user_types = Config::get('userTypes');
        $notifications = Submission::where('seen', 0)->with('post.parent')->orderBy('created_at', 'desc')->get();
        return view('admin.users.edit', compact(['user', 'user_types','notifications']));
    }


    /**
     * update
     * Update Function updates user details. if password is null than it will be same
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id){
       
        $user = User::find($id);
        $values = $request->all();
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'email|required|unique:users,email,'.$user->id,
            'type_id' => 'required'
        ]);
        if($request->HasFile('avatar')){
            dd($request);
            $image = $request->file('avatar');
            $imagename = $image->getClientOriginalName();
            $image->storeAs((config('config.image_path')) ,  $imagename);
            $values['image'] = $imagename;
           
        }
       
        $user->name = $request->all()['name'];
        $user->email = $request->all()['email'];
        $user->type_id = $request->all()['type_id'];
        $user['image'] = $values['image'];
        
        if ($request->all()['password'] !== null) {
            $request->validate([
                'password' => 'required_with:re_password|same:re_password|min:8',
            ]);

            $user->password = Hash::make($request->all()['password']);
        }
        $user->save();
        return $this->index();
    }

    public function resetpassword(Request $request, $id){
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('message', 'პაროლი განახლდა');
    }

    public function giveadmin(Request $request, $id){
        $user = User::find($id);
        $user->type_id = $request->type_id;
        $user->save();
        return redirect()->back()->with('message', 'ადმინისტრატორი დაემატა');
    }

    /**
     * destroy
     * destroies user with id
     * @param  mixed $id
     * @return void
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $id){

            User::destroy($id);
            return $this->index();
            $user = User::find($id);
            $user->type_id = $request->type_id;
            $user->save();
            return redirect()->back()->with('message', 'ადმინისტრატორი წაიშალა');
    }
    
    public function DeleteImages($que) {
       dd($que);
        $user = user::where('id', $que)->first();
        dd($user->image);
        if($user->image != ''){
            unlink(config('config.image_path').$user->image);
        }
        $user->image = '';
        $User_Update = User::where("id", $que)->update(["image" => null]);
        return response()->json(['success' => 'File Deleted']);
    }
}
