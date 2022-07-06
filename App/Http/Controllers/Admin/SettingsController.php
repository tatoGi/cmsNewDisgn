<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SettingsController extends Controller
{
    public function edit(){
        $settings = config('settings.settings');
        // dd($settings);
        $sections = Section::with('translations')->get();

        //  dd($settings);
        
        return view('admin.settings.edit', compact(['settings', 'sections']));
    }
    public function update(Request $request){
        if ($request->has("translatables")) {
            foreach ($request->translatables as $key => $value) {
              if (is_array($value)) {

                $settings[$key] = config('settings.settings.'.$key);
                $filename = base_path("config/settings/settings.php");
                $settings[$key]['value'] = $value;
                if(is_file($filename)) {
                    file_put_contents($filename, arrayToPhpArray($settings));
                }
                  
              }
            }
          }
          if ($request->has("nonTranslatables")) {
            foreach ($request->nonTranslatables as $key1 => $value1) {
              if (!is_array($value1)) {
                $settings[$key1] = config('settings.settings.'.$key1);
                $filename = base_path("config/settings/settings.php");
                $settings[$key1]['value'] = $value1;
                if(is_file($filename)) {
                    file_put_contents($filename, arrayToPhpArray($settings));
                }
              }
            }
          }
       
        // foreach($request->all() as $key => $values){
        //     if ($key !== '_token') {
        //         $settings = config('settings.settings.'.$key);
        //         $filename = base_path("config/settings/settings.php");
        //         dd($settings);
        //         $contents = arrayToPhpArray(array_replace_recursive($settings,$values));
        //         if(is_file($filename)) {
        //             file_put_contents($filename, $contents);
        //         }
        //     }
        // }
        return redirect("/".app()->getLocale()."/admin")->with('message', trans('admin.successfully_saved'));
        // return redirect()->back()->with('message', trans('admin.successfully_saved'));
    }
}
