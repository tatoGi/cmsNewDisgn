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
use Carbon\Carbon;
use Illuminate\View\View;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class PagesController extends Controller
{
	public static function index($model,Request $request)
	
	{
		

		if (request()->method() == 'POST') {
			$values = request()->all();
			
			$values['additional'] = getAdditional($values, config('submissionAttr.additional'));
			$submission = Submission::create($values);
			return redirect()->back()->with([
				'message' => trans('website.submission_sent'),
			]);
		}
		$language_slugs = $model->getTranslatedFullSlugs();
		// dd($language_slugs);


		// BreadCrumb ----------------------------
		$breadcrumbs = [];
		$breadcrumbs[] = [
			'name' => $model[app()->getlocale()]->title,
			'url' => $model->getFullSlug()
		];
		
		$section = $model;
		while ($section->parent_id !== null) {
			

			$section = Section::where('id', $model->parent_id)->with('translations')->first();
			$breadcrumbs[] = [
				'name' => $section->title,
				'url' => $section->getFullSlug()
			
			];
			
		}

		$breadcrumbs = array_reverse($breadcrumbs);
		if ($model->type_id == 1) {
			return self::homePage($model, $language_slugs);
		}
		if ($model->type_id == 2) {

			$news = Section::where('type_id', 2)->with('translations', 'posts')->first();
			
         	$news_posts = Post::where('section_id', $news->id)->with('translations')->orderby('date', 'desc')->paginate(settings('paginate'));

			return view("website.pages.news.index", compact('model', 'breadcrumbs',  'language_slugs' ,'news_posts'));
		}
		if ($model->type_id == 3) {
			
			$about_section = Section::where('type_id', 3)->with('translations', 'posts')->first();
			return view("website.pages.text_page.index", compact('model', 'breadcrumbs', 'about_section', 'language_slugs'));
		}
		if ($model->type_id == 4) {
			$contact = Section::where('type_id', 4)->with('translations', 'posts')->first();
			return view("website.pages.contact.index", compact('model', 'breadcrumbs', 'contact', 'language_slugs'));
		}
		if ($model->type_id == 6) {
			$services = Section::where('type_id', 6)->with('translations', 'posts')->first();
			$service_posts = Post::where('section_id', $services->id)->with('translations')->paginate(settings('service_pagination'));
			// dd($service_posts);
			$projects = Section::where('type_id', 7)->with('translations', 'posts')->first();
			return view("website.pages.service.index", compact('model', 'breadcrumbs', 'services', 'projects', 'language_slugs' ,'service_posts'));
		}
		if ($model->type_id == 7) {
			$partners = Section::where('type_id', 7)->with('translations', 'posts')->first();
		
			$partners_posts = Post::where('section_id', $partners->id)->with('translations')->orderby('date', 'desc')->paginate(settings('partners_pagination'));
			return view("website.pages.partners.index", compact('model', 'breadcrumbs', 'partners', 'partners_posts',  'language_slugs'));
		}
		if ($model->type_id == 8) {
			$teams = Section::where('type_id', 8)->with('translations')->orderby('created_at', 'asc')->first();
			$team_posts = Post::where('section_id', $teams->id)->with('translations')->orderby('date', 'desc')->paginate(settings('paginate'));
		
			return view("website.pages.team.index", compact('model', 'breadcrumbs',  'teams', 'language_slugs','team_posts'));
		}
        if ($model->type_id == 9) {
			$gallery  = Section::where('type_id', 9)->with('translations', 'posts')->first();
			return view("website.pages.gallery.index", compact('model', 'breadcrumbs', 'gallery', 'language_slugs'));
		}
        if ($model->type_id == 10) {
			$photo  = Section::where('type_id', 10)->with('translations', 'posts')->first();
			$photo_posts = Post::where('section_id', $photo->id)->with('translations')->orderby('date', 'asc')->paginate(settings('paginate'));
			
			return view("website.pages.photo.index", compact('model', 'breadcrumbs', 'photo','photo_posts', 'language_slugs'));
		}
        if ($model->type_id == 11) {
			$video  = Section::where('type_id', 11)->with('translations', 'posts')->first();
			$video_posts = Post::where('section_id', $video->id)->with('translations')->orderby('date', 'desc')->paginate(settings('paginate'));
			return view("website.pages.video.index", compact('model', 'breadcrumbs', 'video','video_posts', 'language_slugs'));
		}
		if ($model->type_id == 12) {
			
			$projects  = Section::where('type_id', 12)->with('translations', 'posts')->first();
			$projects_posts = Post::where('section_id', $projects->id)->with('translations')->orderby('date', 'desc')->paginate(settings('paginate'));
			return view("website.pages.project.index", compact('model', 'breadcrumbs', 'language_slugs'));
		}
		
		if ($model->type_id == 13) {

			$category  = Section::where('type_id', 13)->with('translations')->get();
			return view("website.pages.categories.index", compact('model', 'breadcrumbs', 'category', 'language_slugs'));
		}
	
		if ($model->type_id == 14) {
			
			$products  = Section::where('type_id', 14)->with('translations', 'posts' )->first();
			$popular_products = Post::where('section_id', $products->id)->with('translations')->orderby('date', 'asc')->get();
			$category  = Section::where([['type_id', 13],['parent_id',null]])->with('translations','children','children.children')->get();
			$filter_cat_arr = array();
			$filter_category = null;
			
			if($request->category != null)
			{
				 $filter_category = Section::where([['type_id', 13],['id',$request->category]])->with('translations','children','children.children')->first();
				 array_push($filter_cat_arr, $filter_category->id);
				 foreach($filter_category->children as $child_cat )
				 {
					array_push($filter_cat_arr, $child_cat->id);
					foreach($child_cat->children as $grandchild_cat )
					{
						array_push($filter_cat_arr, $grandchild_cat->id);
					}
				 }	 
			}
			if(count($filter_cat_arr)==0)
			{
				$products_posts = Post::where('section_id', $products->id)->with('translations')->paginate(settings('products_pagination'));
			}
			else{
				$products_posts = Post::where('section_id', $products->id)->whereIn('additional->category',$filter_cat_arr)->with('translations')->orderby('date', 'asc')->paginate(settings('products_pagination'));
			}
			
			return view("website.pages.products.index", compact('model', 'breadcrumbs','products_posts','products', 'category', 'language_slugs','filter_category'));
		}
		return view("website.pages.{$model->type['folder']}.index", compact(['model', 'breadcrumbs', 'language_slugs']));
	}
	public static function submission(Request $request)
	{
	

		$validated = $request->validate([
			'name_surname' => 'required',
			'sub_section' => 'required',
			'letter' => 'required',
		]);

		$values = request()->all();
		if ($request->identity != 1) {
			$values['user_id'] = trans('website.unknown');
			$values['name'] = trans('website.unknown');
		}
		$values['additional'] = getAdditional($values, config('submissionAttr.additional'));
		$submission = Submission::create($values);

		return redirect()->back()->with([
			'message' => trans('website.submission_sent'),
		]);
	}


	public static function homePage($model, $locales = null)
	{

		if ($model == '') {
			$model = Section::where('type_id', 1)->with('translations')->first();
		}

		$news = Section::where('type_id', 2)->with('translations', 'posts')->first();
		$news_section_post = Post::Where('section_id', $news->id)->with('translations', function ($q) {
			$q->where('active', 1);
		})->where('active_on_home', 1)->get();

		$teams = Section::where('type_id', 8)->with('translations')->first();
		$teams_section_post = Post::Where('section_id', $teams->id)->with('translations', function ($q) {
			$q->where('active', 1);
		})->where('active_on_home', 1)->get();
		$about_section = Section::where('type_id', 3)->with('translations', 'posts')->first();
		$contact = Section::where('type_id', 4)->with('translations', 'posts')->first();
		$products  = Section::where('type_id', 14)->with('translations', 'posts')->first();
		
		$products_section_post = Post::where('section_id', $products->id)->with('translations',function ($q) {
			$q->where('active', 1);
		})->where('active_on_home', 1)->get();
		
		$popular_products = Post::where('section_id', $products->id)->with('translations',function ($q) {
			$q->where('active', 1);
		})->where('populars', 1)->get();
		// dd($popular_products);
	



		
// dd($teams_section_post);
		$services = Section::where('type_id', 6)->with('translations', 'posts')->first();

		return view('website.home', compact('contact', 'about_section','popular_products', 'products_section_post','model', 'services', 'products', 'teams', 'news','news_section_post', 'teams_section_post'));
	}




	public static function contact($model)
	{

		$breadcrumbs = [];
		$sec = $model;
		$breadcrumbs[] = [
			'name' => $model->title,
			'url' => $model->getFullSlug()
		];
		while ($sec->parent_id !== null) {
			$sec = Section::where('id', $model->parent_id)->with('translations')->first();
			$breadcrumbs[] = [
				'name' => $sec->title,
				'url' => $sec->getFullSlug()
			];
		}
		$sec = Section::where('type_id', sectionTypes()['home']['id'])->with('translations')->first();

		$breadcrumbs[] = [
			'name' => $sec->title,
			'url' => $sec->getFullSlug()
		];
		$breadcrumbs = array_reverse($breadcrumbs);
		$submenu_sections = Section::where('parent_id', $model->id)->orderBy('order', 'asc')->get();

		return view("website.pages.contact.show", compact('model', 'submenu_sections', 'breadcrumbs'));
	}


	public static function submenu($model)
	{

		$breadcrumbs = [];
		$sec = $model;
		$breadcrumbs[] = [
			'name' => $model->title,
			'url' => $model->getFullSlug()
		];
		while ($sec->parent_id !== null) {
			$sec = Section::where('id', $model->parent_id)->with('translations')->first();
			$breadcrumbs[] = [
				'name' => $sec->title,
				'url' => $sec->getFullSlug()
			];
		}
		$sec = Section::where('type_id', sectionTypes()['home']['id'])->with('translations')->first();

		$breadcrumbs[] = [
			'name' => $sec->title,
			'url' => $sec->getFullSlug()
		];
		$breadcrumbs = array_reverse($breadcrumbs);
		$submenu_sections = Section::where('parent_id', $model->id)->orderBy('order', 'asc')->get();

		return view("website.pages.submenu.index", compact('model', 'submenu_sections', 'breadcrumbs'));
	}


	public static function show($model)
	{
		$language_slugs = $model->getTranslatedFullSlugs();
		// dd($language_slugs);
			// BreadCrumb ----------------------------
		$breadcrumbs = [];
		$breadcrumbs[] = [
			'name' => $model[app()->getLocale()]->title,
			'url' => $model->getFullSlug()
		];
		if ($model->section_id !== null) {
			$section = Section::where('id', $model->section_id)->with('translations')->first();
			$breadcrumbs[] = [
				'name' => $section->title,
				'url' => $section->getFullSlug()
			];
			while ($model->parent_id !== null) {
				$sec = Section::where('id', $section->section_id)->with('translations')->first();
		
				$breadcrumbs[] = [
					'name' => $sec->title,
					'url' => $sec->getFullSlug()
				];
			}
		}

		$filter_category = Section::where([['type_id', 13],['id', $model->category]])->with('translations' , 'parent')->get();

		
		


		// $teams_section_post = Post::Where('section_id', $model->id)->with('translations', function ($q) {
		// 	$q->where('active', 1);
		// })->where('active_on_home', 1)->get();
		
		$teams = Section::where('type_id', 8)->with('translations', 'posts')->first();
		$projects = Section::where('type_id', 7)->with('translations', 'posts')->first();
		$products = Section::where('type_id', 14)->with('translations', 'posts')->first();
		$products_posts = Post::where('section_id', $products->id)->with('translations')->paginate(settings('pagination'));
		$photo  = Section::where('type_id', 10)->with('translations', 'posts')->first();
		$photo_posts = Post::where('section_id', $photo->id)->with('translations')->paginate(settings('projects_pagination'));
		$video  = Section::where('type_id', 11)->with('translations', 'posts')->first();
		$video_posts = Post::where('section_id', $video->id)->with('translations')->paginate(settings('pagination'));
		$news = Section::where('type_id', 2)->with('translations', 'posts')->first();
		// dd($model->id);

		$news_posts = Post::where('section_id', $news->id)->with('translations')->orderby('date', 'desc')->paginate(settings('paginate'));

		$news_slider = Post::where('section_id', $news->id)
		->with('translations') 
		->where('posts.id' , '!=', $model->id)
		->orderby('date', 'desc')->limit(settings('news_slier'))
		
		->get(); 



		$breadcrumbs = array_reverse($breadcrumbs);
		$post = Post::where('posts.id', $model->id)
		
			->join('post_translations', 'posts.id', '=', 'post_translations.post_id')
			->where('post_translations.locale', '=', app()->getLocale())
			->select('posts.*', 'post_translations.text', 'post_translations.desc', 'post_translations.title', 'post_translations.locale_additional', 'post_translations.slug')
			->with('files')->first();

	

		$model->views = $model->views + 1;
		$model->save();

		return view("website.pages.{$section->type['folder']}.show", [
			'model' => $model,
			'section' => $section,
			'post' => $post,
			'post' => $model,
			'breadcrumbs' => $breadcrumbs,
			'language_slugs' => $language_slugs,
			'filter_category' => $filter_category,
			'teams' => $teams,
			'news_slider' => $news_slider,
			'news' => $news,
			'news_posts'=> $news_posts,
			'projects' => $projects,
			'products' => $products,
			'products_posts' => $products_posts,
			'photo' => $photo,
			'photo_posts' => $photo_posts,
			'video' => $video,
			'video_posts' => $video_posts,

		])->render();
	}






	public static function subscribe(Request $request)
	{
		$validatedData = $request->validate([
			'email' => 'required|email',
		]);
		$subscriber = Subscription::where('email', $validatedData['email'])->first();
		if ($subscriber == null) {
			$subscription = new Subscription;
			$subscription->locale = app()->getLocale();
			$subscription->email = $validatedData['email'];
			$subscription->save();
			return response()->json(trans('website.successfuly_subscribed'));
		}
		return response()->json(trans('website.allready_subscribed'));
	}
	public static function search(Request $request)
	{
		$model = [];
		$language_slugs['ka'] = 'ka/search?que='.$request->que;
		$language_slugs['en'] = 'en/search?que='.$request->que;
		$validatedData = $request->validate([
			'que' => 'required',
		]);
		$searchText = $validatedData['que'];
		$postTranlations = PostTranslation::whereActive(true)->whereLocale(app()->getLocale())
			->where('title', 'LIKE', "%{$searchText}%")
			->orWhere('desc', 'LIKE', "%{$searchText}%")
			->orWhere('text', 'LIKE', "%{$searchText}%")
			->orWhere('keywords', 'LIKE', "%{$searchText}%")
			->orWhere('locale_additional', 'LIKE', "%{$searchText}%")->pluck('post_id')->toArray();
		$posts  = Post::whereIn('id', $postTranlations)->with('translations', 'parent', 'parent.translations')->paginate(settings('paginate'));
		$posts->appends(['que' => $searchText]);
		$data = [];
		foreach ($posts as $post) {
			$data[] = [
				'slug' => $post->getFullSlug() ?? '#',
				'title' => $post->translate(app()->getLocale())->title,
				'desc' => str_limit(strip_tags($post->translate(app()->getLocale())->desc)),
			];
		}
		return view('website.pages.search.index', compact('posts', 'language_slugs'));
	}	
	public static function prosearch(Request $request)
	{
		
		$language_slugs['ka'] = 'ka/products?que='.$request->que;
		$language_slugs['en'] = 'en/products?que='.$request->que;
		$validatedData = $request->validate([
			'que' => 'required',
		]);
		$searchText = $validatedData['que'];
		
		$postTranlations = PostTranslation::whereActive(true)->whereLocale(app()->getLocale())
	
			->where('title', 'LIKE', "%{$searchText}%")
			->orWhere('desc', 'LIKE', "%{$searchText}%")
			->orWhere('text', 'LIKE', "%{$searchText}%")
			->orWhere('keywords', 'LIKE', "%{$searchText}%")
			->orWhere('locale_additional', 'LIKE', "%{$searchText}%")->pluck('post_id')->toArray();

		$posts  = Post::whereIn('id', $postTranlations)->with('translations', 'parent', 'parent.translations')->paginate(settings('paginate'));
		
		$posts->appends(['que' => $searchText]);
		$data = [];
		foreach ($posts as $post) {
			$data[] = [
				'slug' => $post->getFullSlug() ?? '#',
				'title' => $post->translate(app()->getLocale())->title,
				'desc' => str_limit(strip_tags($post->translate(app()->getLocale())->desc)),
			];
		}
		return view('website.pages.products.index', compact('posts', 'language_slugs'));
	}	

	public static function SearchProduct(request $request){
		
		$que = $request->que;
		$model = Section::where('type_id', 14)->with('translations')->first();
		
		$products  = Section::where('type_id', 14)->with('translations', 'posts')->first();
		$category  = Section::where([['type_id', 13], ['parent_id', null]])->with('translations', 'children', 'children.children')->get();
		$language_slugs = $model->getTranslatedFullSlugs();
		



		
		$products_posts = Post::Where('section_id', $model->id)
	
		->whereHas('translations', function ($q) use ($que) {
			$q->where('title', 'LIKE', "%{$que}%");
			$q->orWhere('desc', 'LIKE', "%{$que}%");
			$q->orWhere('text', 'LIKE', "%{$que}%");
			
		})->orWhereHas('product_category', function($p) use($que){
			
			$p->whereHas('translations',  function ($i) use ($que) {
				$i->where('title', 'LIKE', "%{$que}%");
			});
		})->paginate(settings('products_pagination'));
		
		return view('website.pages.products.index', compact('products_posts', 'model', 'category', 'products', 'language_slugs'));
	}
	
}
