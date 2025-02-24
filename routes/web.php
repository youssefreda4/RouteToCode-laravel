<?php

use App\Http\Controllers\Front\About\AboutController;
use App\Http\Controllers\Front\Comment\CommentController;
use App\Http\Controllers\Front\Contact\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Home\HomeController;
use App\Http\Controllers\Front\Like\LikeController;
use App\Http\Controllers\Front\Post\PostController;
use App\Http\Controllers\Front\Profile\ProfileController;
use App\Http\Controllers\Front\Question\QuestionController;

Route::get('/', [HomeController::class, 'index'])->name('front.home');

Route::middleware(['auth:web', 'user.area'])->group(function () {
    Route::controller(PostController::class)->group(function () {
        Route::get('/posts', 'index')->name('front.posts.view');
        Route::get('/posts/{post}/show', 'show')->name('front.posts.show');
        Route::get('/posts/{category}/category', 'postsCategory')->name('front.posts.category');
        Route::get('/posts/{tag}/tag', 'postsTag')->name('front.posts.tag');
        Route::get('/posts/create', 'create')->name('front.posts.create');
        Route::post('/posts', 'store')->name('front.posts.store');
        Route::get('/posts/{post}/edit', 'edit')->name('front.posts.edit');
        Route::put('/posts/{post}', 'update')->name('front.posts.update');
        Route::delete('/posts/{post}', 'destroy')->name('front.posts.destroy');
    });

    Route::controller(LikeController::class)->group(function () {
        Route::post('/like/{post}', 'store')->name('front.likes.store');
        Route::get('/like/{notification}', 'markAsRead')->name('front.likes.markAsRead');
    });


    Route::controller(CommentController::class)->group(function () {
        Route::post('/comments/{post}', 'store')->name('front.comments.store');
        Route::delete('/comments/{comment}', 'destroy')->name('front.comments.destroy');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('front.profile.view');
        Route::get('/profile/{user}/show', 'show')->name('front.profile.show');
        Route::get('/profile/{user}/edit', 'edit')->name('front.profile.edit');
        Route::put('/profile/{user}', 'update')->name('front.profile.update');
    });
});

Route::get('/about', [AboutController::class, 'index'])->name('front.about.view');

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('front.contact.view');
    Route::post('/contact', 'store')->name('front.contact.store');
});


require_once(__DIR__ . '/admin.php');
require_once(__DIR__ . '/auth.php');
