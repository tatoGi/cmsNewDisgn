<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Auth\AuthServiceProvider;
use App\Http\Controllers\Website\RoutesController;
use App\Http\Controllers\Website\PagesController;
use App\Http\Controllers\Website\SearchController;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Mail\Mailers;
use \UniSharp\LaravelFilemanager\Lfm;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::get('/testing', function () {

    $postIds = DB::connection('mysql')->table('wp_term_relationships')->where('term_taxonomy_id', 259)->orderBy('object_id', 'desc')->pluck('object_id');

    $posts = Post::whereIn('id', $postIds)->update(['section_id' => 15]);
});


Route::get('/register', function () {
    return redirect('/login');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();


/*
|--------------------------------------------------------------------------
| Check if user is auth
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});
Route::middleware(['auth.check'])->group(function () {
    /*
    |--------------------------------------------------------------------------
    | Check if user is SUPERUSER
    |--------------------------------------------------------------------------
    */

    Route::middleware('isSuperuser')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

        // Admin\UploadFilesController
        Route::post('/admin/upload/image', [UploadFilesController::class, 'uploadImage'])->name('image.upload');
        Route::post('/admin/upload/image/delete', [UploadFilesController::class, 'deleteImage'])->name('image.del');
        Route::get('/admin/upload/image/delete', [UploadFilesController::class, 'clearChache'])->name('image.clear');
        //Profile ------------------------------------->
        Route::get('/admin/users', [UsersController::class, 'index']);
        Route::get('/admin/users/add', [UsersController::class, 'create']);
        Route::post('/admin/users/add', [UsersController::class, 'store']);
        Route::get('/admin/users/edit/{id}', [UsersController::class, 'edit']);
        Route::get('/admin/users/logs/{id}', [UsersController::class, 'logs']);
        Route::post('/admin/users/edit/{id}', [UsersController::class, 'update']);
        Route::post('/admin/users/destroy/{id}', [UsersController::class, 'destroy']);
        Route::delete('/admin/users/DeleteImages/{que}', [UsersController::class, 'DeleteImages']);
        
        //Sections ------------------------------------->
        Route::get('/admin/sections', [SectionController::class, 'index'])->name('section.list');
        Route::get('/admin/sections/create', [SectionController::class, 'create']);
        Route::post('/admin/sections/create', [SectionController::class, 'store']);
        Route::get('/admin/sections/edit/{id}', [SectionController::class, 'edit']);
        Route::post('/admin/sections/edit/{id}', [SectionController::class, 'update']);
        Route::get('/admin/sections/destroy/{id}', [SectionController::class, 'destroy']);
        Route::post('/admin/sections/arrange', [SectionController::class, 'arrange']);


        //Post ------------------------------------->
        Route::get('/admin/section/{sec}/posts', [PostController::class, 'index'])->name('post.list');
        Route::get('/admin/section/{sec}/posts/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/admin/section/{sec}/posts/create', [PostController::class, 'store'])->name('post.store');
        Route::get('/admin/section/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::post('/admin/section/posts/{post}/edit', [PostController::class, 'update'])->name('post.update');
        Route::get('/admin/section/posts/{post}/delete', [PostController::class, 'destroy'])->name('post.destroy');
        //Settings ---------------------------
        Route::get('/admin/settings/edit', [SettingsController::class, 'edit'])->name('settings.edit');
        Route::post('/admin/settings/edit', [SettingsController::class, 'update'])->name('settings.update');


        //Banners -------------------------------------->
        Route::get('/admin/banners/{type}', [BannerController::class, 'index'])->name('banner.list');
        Route::get('/admin/banners/{type}/create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('/admin/banners/{type}/create', [BannerController::class, 'store'])->name('banner.store');
        Route::get('/admin/banners/{banner}/edit', [BannerController::class, 'edit'])->name('banner.edit');
        Route::post('/admin/banners/{banner}/edit', [BannerController::class, 'update'])->name('banner.update');
        Route::get('/admin/banners/{banner}/delete', [BannerController::class, 'destroy'])->name('banner.destroy');
        //Language ---------------------------
        Route::get('/admin/languages/edit', [LanguageController::class, 'edit'])->name('languages.edit');
        Route::post('/admin/languages/edit', [LanguageController::class, 'update'])->name('languages.update');

        Route::get('/admin/submissions', [SubmissionController::class, 'index']);
        Route::get('/admin/submission/{submission}', [SubmissionController::class, 'show']);
        Route::get('/admin/submission/destroy/{submission}', [SubmissionController::class, 'destroy']);

        Route::delete('/admin/sections/DeleteCover/{que}', [SectionController::class, 'DeleteCover']);
        Route::delete('/admin/section/posts/DeleteFile/{que}', [PostController::class, 'DeleteFile']);



        // Route::get('/', 'ChatsController@index');
        // Route::get('messages', 'ChatsController@fetchMessages');
        // Route::post('messages', 'ChatsController@sendMessage');


        //  categories ---------------------------
        //  Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories.index');
        //  Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        //  Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('categories.store');
        //  Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        //  Route::post('/admin/categories/update', [CategoryController::class, 'update'])->name('categories.update');
        //  Route::get('/admin/categories/{id}/delete', [CategoryController::class, 'destroy'])->name('categories.delete');
       
        //  Route::group(['prefix' => 'products'], function () {

        //     Route::get('/', 'Admin\ProductController@index')->name('admin.products.index');
        //     Route::get('/create', 'Admin\ProductController@create')->name('admin.products.create');
        //     Route::post('/store', 'Admin\ProductController@store')->name('admin.products.store');
        //     Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin.products.edit');
        //     Route::post('/update', 'Admin\ProductController@update')->name('admin.products.update');
 
        //     Route::post('images/upload', 'Admin\ProductImageController@upload')->name('admin.products.images.upload');
        //     Route::get('images/{id}/delete', 'Admin\ProductImageController@delete')->name('admin.products.images.delete');
 
        //     Route::get('attributes/load', 'Admin\ProductAttributeController@loadAttributes');
        //     Route::post('attributes', 'Admin\ProductAttributeController@productAttributes');
        //     Route::post('attributes/values', 'Admin\ProductAttributeController@loadValues');
        //     Route::post('attributes/add', 'Admin\ProductAttributeController@addAttribute');
        //     Route::post('attributes/delete', 'Admin\ProductAttributeController@deleteAttribute');
 
        //  });
        // Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
        // Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
        // Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
        // Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
        // Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
        // Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.categories.delete');
    });
});

Route::post('/submission', [PagesController::class, 'submission'])->name('submission');
Route::post('/subscribe', [PagesController::class, 'subscribe'])->name('subscribe');
Route::get('/search', [PagesController::class, 'search'])->name('search');
Route::get('/SearchProduct', [PagesController::class, 'SearchProduct'])->name('SearchProduct');
Route::any('/', [PagesController::class, 'homePage']);
Route::any('/{all}', [RoutesController::class, 'index'])->where('all', '.*');
