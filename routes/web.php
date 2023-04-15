<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
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


Route::controller(AdminPostController::class) -> group(function(){
    Route::get('admin/posts/','index')->name('view-admin-post')->middleware('admin');
    Route::get('admin/posts/create','create')->name('create-admin-post')->middleware('admin');
    Route::post('admin/posts','store')->name('store-admin-post')->middleware('admin');
    Route::patch('admin/posts/{post:slug}','update')->name('update-admin-post')->middleware('admin');
    Route::delete('admin/posts/{post:slug}','destroy')->name('delete-admin-post')->middleware('admin');
    Route::get('admin/posts/{post:slug}/edit','edit')->name('edit-admin-post')->middleware('admin');
});

