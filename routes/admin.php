<?php



use App\Http\Controllers\{
    AdminPostController
};

use Illuminate\Support\Facades\Route;




Route::resource('admin/posts',AdminPostController::class,[
    'names' => [
        'index' => 'view-admin-post',
        'create' => 'create-admin-post',
    ] ,
    'parameters' => [
        'posts' => 'post:slug'
    ]
])->except('show');



