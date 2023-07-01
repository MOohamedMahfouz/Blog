<?php



use App\Http\Controllers\{
    NewsletterController,
    PostCommentsController,
    PostController
};

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Auth::routes();

Route::controller(PostController::class) -> group(function(){
    Route::get('/','search')->name('search');
    Route::get('/posts/{slug}','show')->name('view-post');
});


Route::post('newsletter',NewsletterController::class);

Route::post('posts/{post:slug}/comments',[PostCommentsController::class,'store']);



