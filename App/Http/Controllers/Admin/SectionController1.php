<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Section;
use App\Models\MenuSection;
use App\Models\Slug;
use App\Models\SectionTranslation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Redirect;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SectionController extends Controller
{
    
    /**
     * index
     *  Lists Sections
     * @return void
     */
    public function index(){
        $sections = Section::where('parent_id', null)->orderBy('order', 'asc')->with('children')->get(); 
        return view('admin.sections.list', compact('sections'));
    }
    public function create(){
        $sectionTypes = sectionTypes();
        $sections = Section::with('translations')->get();
        $menuTypes = menuTypes();
        return view('admin.sections.add', compact(['sectionTypes', 'sections', 'menuTypes']));
    }

    public function store(Request $request){
        $values = $request->all();
        if($request->cover != ''){
            $originalName = $request->cover->getClientOriginalName();
            $newName = uniqid() . "." . $request->cover->getClientOriginalExtension();
            $request->cover->move(config('config.image_path'), $newName );
            $values['cover'] = $newName;
        }
        $values['additional'] = getAdditional($values, config('sectionAttr.additional'));

        foreach(config('app.locales') as $locale){
            if($values[$locale]['slug'] == ''){
                $values[$locale]['slug'] = SlugService::createSlug(SectionTranslation::class, 'slug', $values[$locale]['title']);
            }else{
                $values[$locale]['slug'] = SlugService::createSlug(SectionTranslation::class, 'slug', $values[$locale]['slug']);
            }
            $values[$locale]['locale_additional'] = getAdditional($values[$locale], config('sectionAttr.translateable_additional'));
        }
        $section = Section::create($values);
		if (isset($values['menu_types']) && $values['menu_types'] != '') {
			foreach($values['menu_types'] as $type){
				MenuSection::create([
					'section_id' => $section->id,
					'menu_type_id' => $type
				]);
			}
		}
        return Redirect::route('section.list', [app()->getLocale()]);
    }

    public function edit($id){
        $section = Section::where('id', $id)->with(['translations', 'menuTypes'])->first();
        $sections = Section::with('translations')->where('id', '!=', $section->id)->where('parent_id', '!=', $section->id)->orWhere('parent_id', null)->get();
        $sectionTypes = sectionTypes();
        $menuTypes = menuTypes();
        return view('admin.sections.edit', compact(['sections', 'section', 'sectionTypes', 'menuTypes']));
    }

    public function update($id, Request $request){

        $values = $request->all();
        Validator::validate($values, [
            'type_id' => 'required'
        ]);
        $section = Section::find($id);
        MenuSection::where('section_id', $id)->delete();
        if($request->cover != ''){
            // $originalName = $request->cover->getClientOriginalName();
            $newName = uniqid() . "." . $request->cover->getClientOriginalExtension();
            $request->cover->move(config('config.image_path'), $newName );
            $values['cover'] = $newName;
        }
        $values['additional'] = getAdditional($values, config('sectionAttr.additional'));
        foreach(config('app.locales') as $locale){
            if(($values[$locale]['slug'] != $section->slug)){
                $values[$locale]['slug'] = SlugService::createSlug(SectionTranslation::class, 'slug', $values[$locale]['slug']);
            }
            $values[$locale]['locale_additional'] = getAdditional($values[$locale], config('sectionAttr.translateable_additional'));
        }
        $section = Section::find($id)->update($values);
        if (isset($values['menu_types']) && $values['menu_types'] !== null) {
            foreach($values['menu_types'] as $type){
                MenuSection::create([
                    'section_id' => $id,
                    'menu_type_id' => $type
                ]);
            }
        }

        // $section = Section::find($id);

        // foreach(config('app.locales') as $locale){
        //     if(isset($values[$locale]['active']) && $values[$locale]['active'] == 1){
        //         $oldSlug = Section::find($id)->slugs()->where('locale', $locale)->first();
        //         if ($oldSlug !== null) {
        //             $newSlug = genFullSlug($section, $locale);
        //             $slugs = Slug::where('fullSlug', 'LIKE', $oldSlug->fullSlug.'%')->get();
        //             if (count($slugs) > 0) {
        //                 foreach($slugs as $slug){
        //                     $oldFullSlug = $slug->fullSlug;
        //                     $newFullSlug = str_replace($oldSlug->fullSlug, $newSlug, $slug->fullSlug);
        //                     $slug->fullSlug = $newFullSlug;
        //                     $slug->save();
        //                 }
        //             }
        //         }else{
        //             $section->slugs()->create([
        //                 'fullSlug' => genFullSlug($section, $locale),
        //                 'locale' => $locale
        //             ]);

        //         }
        //     }

        // }
        return Redirect::route('section.list', [app()->getLocale()]);
    }

    public function destroy($id) {
        $sec = Section::find($id)->with('translations')->first();
        foreach(Section::find($id)->slugs()->get() as $slug){
            Slug::where('fullSlug', 'LIKE', $slug->fullSlug.'%')->delete();
        }


        Section::find($id)->slugs()->delete();
        Section::find($id)->delete();

        return Redirect::route('section.list', [app()->getLocale()]);
    }
    public function arrange(Request $request) {
        $array = $request->input('orderArr');
        Section::rearrange($array);
        return ['error' => false];
    }
}
