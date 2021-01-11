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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('categories', App\Http\Controllers\CategoryController::class);

Route::resource('testimonies', App\Http\Controllers\TestimonyController::class);

Route::resource('testAndEvaluations', App\Http\Controllers\TestAndEvaluationController::class);


Route::resource('blogCategories', App\Http\Controllers\BlogCategoryController::class);

Route::resource('blogs', App\Http\Controllers\BlogController::class);

Route::resource('blogComments', App\Http\Controllers\BlogCommentController::class);

Route::resource('chatDiscussions', App\Http\Controllers\ChatDiscussionController::class);

Route::resource('chatMessages', App\Http\Controllers\ChatMessageController::class);