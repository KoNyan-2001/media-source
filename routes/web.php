<?php

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

Route::get('/', function () {
    return view('welcome');
});
//For Admin
Route::group(['prefix'=>'admin', 'middleware'=>['auth','IsAdmin']], function(){
    Route::get('/dashboard', [App\Http\Controllers\admin\AdminDashboardController::class, 'index']);

    //for users
    Route::get('/users', [App\Http\Controllers\admin\UserController::class, 'index']);
    Route::get('/users/{id}/edit', [App\Http\Controllers\admin\UserController::class, 'edit']);
    Route::post('/users/{id}/update', [App\Http\Controllers\admin\UserController::class, 'update']);
    Route::post('/users/{id}/destroy', [App\Http\Controllers\admin\UserController::class, 'destroy']);

    //for category
    Route::resource('categories', App\Http\Controllers\admin\CategoryController::class);
    Route::resource('posts', App\Http\Controllers\admin\PostController::class);
});



Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
