<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/lang/{lang}', \App\Http\Controllers\User\Lang\LangController::class);

Route::name('user.')->group(function () {
    Route::get('/category/map', \App\Http\Controllers\User\Post\CategoryMapController::class)->name('category.map');
    Route::get('/', \App\Http\Controllers\User\Post\IndexController::class)->name('index');
    Route::get('/profile', \App\Http\Controllers\User\Profile\MyPostController::class)->name('profile');
    Route::get('/map', \App\Http\Controllers\User\Post\MapCategory::class)->name('map');
    Route::get('/map/post', \App\Http\Controllers\User\Post\MapContoller::class)->name('map.post');
    Route::get('/search', \App\Http\Controllers\User\Post\SearchController::class)->name('search');
    Route::get('/category', \App\Http\Controllers\User\Post\CategoryController::class)->name('category');
    Route::get('/posts/create', \App\Http\Controllers\User\Post\CreateController::class)->name('createPost');
    Route::post('/posts/store', \App\Http\Controllers\User\Post\StoreController::class)->name('storePost');
    Route::post('/posts/{post}/comment/store', \App\Http\Controllers\User\Comment\StoreController::class)->name('storeComment');
    Route::post('/posts/{post}/comment/{comment}/store', \App\Http\Controllers\User\Comment\ReplyComment::class)->name('storeReplyComment');
    Route::get('/posts/{post}', \App\Http\Controllers\User\Post\ShowController::class)->name('showPost');
    Route::post('/posts/{post}/like', \App\Http\Controllers\User\Post\LikeController::class)->name('likePost');
    Route::post('/posts/{post}/unlike', \App\Http\Controllers\User\Post\UnlikeController::class)->name('unlikePost');
    Route::get('/journalist/{journalist}', \App\Http\Controllers\User\Journalist\IndexController::class)->name('showJournalist');

    Route::get('/back', \App\Http\Controllers\User\Post\BackController::class)->name('back.map');

});

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', \App\Http\Controllers\Admin\Post\InactiveController::class)->name('index');
    Route::get('/posts', \App\Http\Controllers\Admin\Post\IndexController::class)->name('posts');
    Route::get('/posts/{post}', \App\Http\Controllers\Admin\Post\ShowController::class)->name('posts.show');
    Route::post('/posts/{post}', \App\Http\Controllers\Admin\Post\UpdateController::class)->name('posts.update');
    Route::post('/posts', \App\Http\Controllers\Admin\Post\StoreController::class)->name('posts.store');
    Route::delete('/posts/{post}', \App\Http\Controllers\Admin\Post\DeleteController::class)->name('posts.delete');
    Route::get('/users', \App\Http\Controllers\Admin\User\IndexController::class)->name('users');
    Route::post('/users', \App\Http\Controllers\Admin\User\StoreController::class)->name('users.store');
    Route::delete('/users/{user}', \App\Http\Controllers\Admin\User\DeleteController::class)->name('users.delete');
    Route::get('/quotes', \App\Http\Controllers\Admin\Quote\IndexController::class)->name('quotes');
    Route::post('/quotes', \App\Http\Controllers\Admin\Quote\StoreController::class)->name('quotes.store');
    Route::delete('/quotes/{quote}', \App\Http\Controllers\Admin\Quote\DeleteController::class)->name('quotes.delete');
    Route::get('/ads', \App\Http\Controllers\Admin\Ad\IndexController::class)->name('ad');
    Route::post('/ads', \App\Http\Controllers\Admin\Ad\StoreController::class)->name('ad.store');
    Route::delete('/ads/{ad}', \App\Http\Controllers\Admin\Ad\DeleteController::class)->name('ad.delete');
    Route::get('/quotes', \App\Http\Controllers\Admin\Quote\IndexController::class)->name('quote');
    Route::post('/quotes', \App\Http\Controllers\Admin\Quote\StoreController::class)->name('quote.store');
    Route::delete('/quotes/{quote}', \App\Http\Controllers\Admin\Quote\DeleteController::class)->name('quote.delete');
    Route::get('/categories', \App\Http\Controllers\Admin\Category\IndexController::class)->name('category');
    Route::post('/categories', \App\Http\Controllers\Admin\Category\StoreController::class)->name('category.store');
    Route::delete('/categories/{category}', \App\Http\Controllers\Admin\Category\DeleteController::class)->name('category.delete');
    Route::get('/deleted', \App\Http\Controllers\Admin\Deleted\IndexController::class)->name('deleted');
    Route::post('/deleted/{delete}', \App\Http\Controllers\Admin\Deleted\UpdateController::class)->name('deleted.update');
});

Auth::routes();
