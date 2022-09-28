<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ProductContract;
use App\Http\Controllers\Website\HomePageController;
use App\Http\Controllers\Website\NotificationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Auth\AuthServiceProvider;
use App\Http\Controllers\Website\RoutesController;
use App\Http\Controllers\Website\PagesController;
use App\Http\Controllers\Website\SearchController;
use App\Http\Controllers\Website\ProductController;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

    /*
    |--------------------------------------------------------------------------
    | Check if user is SUPERUSER
    |--------------------------------------------------------------------------
    */

    Route::middleware('isSuperuser','locale','auth.check')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

        // Admin\UploadFilesController
        Route::post('/admin/upload/image', [UploadFilesController::class, 'uploadImage'])->name('image.upload');
        Route::post('/admin/upload/image/delete', [UploadFilesController::class, 'deleteImage'])->name('image.del');
        Route::get('/admin/upload/image/delete', [UploadFilesController::class, 'clearChache'])->name('image.clear');
        
        //Profile ------------------------------------->
        Route::get('/admin/users', [UsersController::class, 'index']);
        Route::get('/admin/users/add', [UsersController::class, 'create']);
        Route::post('/admin/users/store', [UsersController::class, 'store']);
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
        //category.............
        Route::get('/admin/category', [CategoryController::class, 'index']);

        //mailers...............
        Route::get('/admin/mailers', [EmailerController::class, 'index'])->name('admin.mailers');
        Route::get('/admin/mailers/add', [EmailerController::class, 'add']);
        Route::post('/admin/mailers/store', [EmailerController::class, 'store']);
        Route::get('/admin/mailers/edit/{id}', [EmailerController::class, 'edit'])->name('email.edit');
        Route::post('/admin/mailers/update/{id}', [EmailerController::class, 'update'])->name('email.update');
        Route::get('/admin/mailers/delete/{id}', [EmailerController::class, 'delete'])->name('email.delete');
        Route::get('/admin/send-mail',[EmailerController::class, 'emailSend'])->name('send.email');
        //calendar...................
        Route::get('/admin/calendar-event', [FullCalendarController::class, 'index']);
        Route::post('/admin/calendar-crud-ajax', [FullCalendarController::class, 'calendarEvents']);
        Route::post('/admin/fullcalendar/create', [FullCalendarController::class, 'create']);
        Route::post('/admin/fullcalendar/update', [FullCalendarController::class, 'update']);
        Route::post('/admin/fullcalendar/delete', [FullCalendarController::class, 'destroy']);
 
    });
Route::middleware('web','locale')->group(function () {
Route::post('/submission', [NotificationController::class, 'submission'])->name('submission');
Route::post('/subscribe', [NotificationController::class, 'subscribe'])->name('subscribe');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/SearchProduct', [SearchController::class, 'SearchProduct'])->name('SearchProduct');
Route::any('/', [HomePageController::class, 'index']);
Route::any('/{all}', [RoutesController::class, 'index'])->where('all', '.*');
      // products
      Route::get('/admin/products', [ProductController::class, 'index']);  
      Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
      Route::get('/admin/products/store', [ProductController::class, 'store'])->name('products.store');
      Route::get('/admin/products/cart', [ProductController::class, 'cart'])->name('cart');
      Route::get('/admin/products/add-to-cart/{id?}', [ProductController::class, 'addToCart'])->name('add.to.cart');
      Route::patch('/admin/products/update-cart', [ProductController::class, 'update'])->name('update.cart');
      Route::delete('/admin/products/remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
});

