<?php

use App\Http\Controllers\adminCategoryController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\adminPostController;
use App\Http\Controllers\adminUserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\postController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\sessionController;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[postController::class,'index']);

Route::middleware('guest')->group(function (){

    Route::view('underApprovement', 'underApprovement');

    Route::controller(registerController::class)->group(function (){

        Route::get('register','create');

        Route::post('register','store');
    });

    Route::controller(sessionController::class)->group(function (){

        Route::get('login','create');

        Route::post('login','store');
    });

    Route::controller(adminController::class)->group(function (){

        Route::get('admin/login','login');

        Route::post('admin/check','check');

    });


});

Route::group(['middleware'=>'auth'],function(){

    Route::view('user/profile','user')->name('userProfile');

    Route::post('logout',[sessionController::class,'destroy']);

    Route::controller(CommentController::class)->group(function (){

        Route::post('storeComment/{post}','storeComment')->name('storeComment');

        Route::delete('comment/{comment}','destroy');

    });

    Route::controller(postController::class)->group(function (){

        Route::post('post/create','store')->name('storePost');

        Route::get('post/{post:title}','show')->name('showPost');

        Route::get('post/{post}/edit','edit')->name('editPost');

        Route::patch('post/{post}','update');

        Route::delete('post/{post}','destroy');

    });

});

Route::group(['middleware'=>'admin','prefix'=>'admin','controller'=>adminController::class],function(){

        Route::get('/dashboard','index');

        Route::post('/logout','destroySession');

        Route::get('/account','account');

});

Route::group(['middleware'=>'admin','prefix'=>'admin/posts','controller'=>adminPostController::class],function (){

        Route::get('/table','postTable')->name('postTable');

        Route::get('/all','allPosts');

        Route::get('/create','createPost');

        Route::post('/store','storePost');

        Route::get('/{post}/edit','editPost');

        Route::patch('/{post}/update','updatePost');

        Route::get('/{post}/delete','deletePost');

        Route::get('/{post}/change','changeStatus');

});

Route::group(['middleware'=>'admin','prefix'=>'admin/users','controller'=>adminUserController::class],function (){

        Route::get('/all','allUsers');

        Route::get('/create','createUser');

        Route::post('/store','storeUser');

        Route::get('/{user}/edit','editUser');

        Route::patch('/{user}/update','updateUser');

        Route::get('/{user}/delete','deleteUser');

        Route::get('/{user}/changeRole','changeRole');

        Route::get('/{user}/changeStatus','changeStatus');

});

Route::group(['middleware'=>'admin','prefix'=>'admin/categories','controller'=>adminCategoryController::class],function (){

        Route::get('/all','allCategory')->name('allCategory');

        Route::get('/create','createCategory');

        Route::post('/store','storeCategory');

        Route::get('/{category}/edit','editCategory');

        Route::patch('/{category}/update','updateCategory');

        Route::get('/{category}/delete','deleteCategory');

});






Route::get('/like',[\App\Http\Controllers\Controller::class,'testlike']);

Route::get('addlike',[\App\Http\Controllers\Controller::class,'addone'])->name('addone');
