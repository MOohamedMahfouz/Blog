<?php



use App\Http\Controllers\{
    NewsletterController,
    PostCommentsController,
    PostController,
    UploadController
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
use Intervention\Image\ImageManagerStatic as Image;

Route::get('/hi', function() {
    $img = Image::make('foo.jpg')->resize(300, 200);
    $img->brightness(35);
    $img->blur(50);
    $img->colorize(0, 30, 0);
    $img->rotate(-45);
    return $img->response('jpg');
});

Auth::routes();

Route::post('upload',[UploadController::class,'store']);

Route::controller(PostController::class) -> group(function(){
    Route::get('/','search')->name('search');
    Route::get('/posts/{post:slug}','show')->name('view-post')
    ->missing(function () {
        return to_route('search');
    });
});


Route::post('newsletter',NewsletterController::class);

Route::post('posts/{post:slug}/comments',[PostCommentsController::class,'store']);

Route::fallback(function () {
    return to_route('search');
});

