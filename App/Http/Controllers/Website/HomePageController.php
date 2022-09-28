<?php

namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\SectionTranslation;
use App\Models\Subscription;
use App\Models\Post;
use App\Models\PostTranslation;
use App\Models\PostFile;
use App\Models\Slug;
use App\Models\Submission;
use App\Models\SubmissionFile;
use Illuminate\Support\Facades\Validator;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
use Carbon\Carbon;
use Illuminate\View\View;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index($model, $locales = null)
    {
        SEOMeta::setTitle('Home');
        SEOMeta::setDescription('This is my page description');
        SEOMeta::setCanonical('https://codecasts.com.br/lesson');
        SEOMeta::addKeyword(['key1', 'key2', 'key3']);
        if ($model == '') {
			$model = Section::where('type_id', 1)->with('translations')->first();
		}
		$news = Section::where('type_id', 2)->with('translations', 'posts')->first();
        if(isset($news)){
            $news_section_post = Post::Where('section_id', $news->id)->with('translations', function ($q) {
                $q->where('active', 1);
            })->where('active_on_home', 1)->get();
        }	
		$teams = Section::where('type_id', 8)->with('translations')->first();
        if(isset($teams)){
            $teams_section_post = Post::Where('section_id', $teams->id)->with('translations', function ($q) {
                $q->where('active', 1);
            })->where('active_on_home', 1)->get();
        }
        
            $about_section = Section::where('type_id', 3)->with('translations', 'posts')->first();
          
            $contact = Section::where('type_id', 4)->with('translations', 'posts')->first();
		$products  = Section::where('type_id', 14)->with('translations', 'posts')->first();
		return view('website.home', compact('contact','about_section','model','news'));
        
		

    }

}
