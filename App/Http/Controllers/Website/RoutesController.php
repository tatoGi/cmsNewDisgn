<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Website\PagesController;
use Illuminate\Http\Request;
use App\Models\Slug;

class RoutesController extends Controller
{
    public function index($url,Request $request){
        if($url == 'search'){
            return PagesController::search($request);
        }
        $slug = Slug::where('fullSlug', app()->getLocale()."/{$url}")->first();
        
        // dd($slug);
        // dd($slug->slugable()->get());
        // dd($slug);
        $model = $slug->slugable()->first();
        
        // dd($slug->slugable()->get());
        if ($slug->slugable_type === "App\Models\Section") {
            return PagesController::index($model, $request);

        }
        if ($slug->slugable_type === "App\Models\Post") {
            return PagesController::show($model);
        }

    }
}
