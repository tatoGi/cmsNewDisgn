<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Post;
use App\Models\PostTranslation;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index(Request $request)
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
		$posts  = Post::whereIn('id', $postTranlations)->with('translations', 'parent', 'parent.translations')->fastPaginate(settings('paginate'));
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
		})->fastPaginate(settings('products_pagination'));
		
		return view('website.pages.products.index', compact('products_posts', 'model', 'category', 'products', 'language_slugs'));	
}
}
