<?php

use App\Http\Controllers\Admin\Admin\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Comment\CommentController;
use App\Http\Controllers\Admin\Home\HomeController;
use App\Http\Controllers\Admin\Message\MessageController;
use App\Http\Controllers\Admin\Notification\NotificationController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Question\QuestionController;
use App\Http\Controllers\Admin\Skill\SkillController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:admin', 'admin.area'])->group(function () {
    Route::get('/dashboard/home', [HomeController::class, 'index'])->name('dashboard.home');

    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard/admins', 'index')->name('dashboard.admins.view');
        Route::get('/dashboard/admins/search', 'search')->name('dashboard.admins.search');
        Route::get('/dashboard/admins/create', 'create')->name('dashboard.admins.create');
        Route::post('/dashboard/admins', 'store')->name('dashboard.admins.store');
        Route::get('/dashboard/admins/{admin}/edit', 'edit')->name('dashboard.admins.edit');
        Route::put('/dashboard/admins/{admin}', 'update')->name('dashboard.admins.update');
        Route::delete('/dashboard/admins/{admin}/destroy', 'destroy')->name('dashboard.admins.destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/dashboard/users', 'index')->name('dashboard.users.view');
        Route::get('/dashboard/users/{user}/show', 'show')->name('dashboard.users.show');
        Route::get('/dashboard/users/search', 'search')->name('dashboard.users.search');
        Route::get('/dashboard/users/create', 'create')->name('dashboard.users.create');
        Route::post('/dashboard/users', 'store')->name('dashboard.users.store');
        Route::get('/dashboard/users/{user}/edit', 'edit')->name('dashboard.users.edit');
        Route::put('/dashboard/users/{user}', 'update')->name('dashboard.users.update');
        Route::delete('/dashboard/users/{user}/destroy', 'destroy')->name('dashboard.users.destroy');
    });

    Route::controller(SkillController::class)->group(function () {
        Route::get('/dashboard/skills', 'index')->name('dashboard.skills.view');
        Route::get('/dashboard/skills/search', 'search')->name('dashboard.skills.search');
        Route::get('/dashboard/skills/{skill}/users', 'users')->name('dashboard.skills.users');
        Route::get('/dashboard/skills/create', 'create')->name('dashboard.skills.create');
        Route::post('/dashboard/skills', 'store')->name('dashboard.skills.store');
        Route::get('/dashboard/skills/{skill}/edit', 'edit')->name('dashboard.skills.edit');
        Route::put('/dashboard/skills/{skill}', 'update')->name('dashboard.skills.update');
        Route::delete('/dashboard/skills/{skill}/destroy', 'destroy')->name('dashboard.skills.destroy');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/dashboard/categories', 'index')->name('dashboard.categories.view');
        Route::get('/dashboard/categories/search', 'search')->name('dashboard.categories.search');
        Route::get('/dashboard/categories/{category}/posts', 'posts')->name('dashboard.categories.posts');
        Route::get('/dashboard/categories/create', 'create')->name('dashboard.categories.create');
        Route::post('/dashboard/categories', 'store')->name('dashboard.categories.store');
        Route::get('/dashboard/categories/{category}/edit', 'edit')->name('dashboard.categories.edit');
        Route::put('/dashboard/categories/{category}', 'update')->name('dashboard.categories.update');
        Route::delete('/dashboard/categories/{category}/destroy', 'destroy')->name('dashboard.categories.destroy');
    });

    Route::controller(TagController::class)->group(function () {
        Route::get('/dashboard/tags', 'index')->name('dashboard.tags.view');
        Route::get('/dashboard/tags/search', 'search')->name('dashboard.tags.search');
        Route::get('/dashboard/tags/{tag}/posts', 'posts')->name('dashboard.tags.posts');
        Route::get('/dashboard/tags/create', 'create')->name('dashboard.tags.create');
        Route::post('/dashboard/tags', 'store')->name('dashboard.tags.store');
        Route::get('/dashboard/tags/{tag}/edit', 'edit')->name('dashboard.tags.edit');
        Route::put('/dashboard/tags/{tag}', 'update')->name('dashboard.tags.update');
        Route::delete('/dashboard/tags/{tag}/destroy', 'destroy')->name('dashboard.tags.destroy');
    });

    Route::controller(PostController::class)->group(function () {
        Route::get('/dashboard/posts', 'index')->name('dashboard.posts.view');
        Route::get('/dashboard/posts/search', 'search')->name('dashboard.posts.search');
        Route::get('/dashboard/posts/{post}/comments', 'comments')->name('dashboard.posts.comments');
        Route::get('/dashboard/posts/create', 'create')->name('dashboard.posts.create');
        Route::post('/dashboard/posts', 'store')->name('dashboard.posts.store');
        Route::get('/dashboard/posts/{post}/edit', 'edit')->name('dashboard.posts.edit');
        Route::put('/dashboard/posts/{post}', 'update')->name('dashboard.posts.update');
        Route::delete('/dashboard/posts/{post}/destroy', 'destroy')->name('dashboard.posts.destroy');
    });

    Route::controller(CommentController::class)->group(function () {
        Route::get('/dashboard/comments', 'index')->name('dashboard.comments.view');
        Route::get('/dashboard/comments/search', 'search')->name('dashboard.comments.search');
        Route::get('/dashboard/comments/{comment}/post', 'post')->name('dashboard.comments.post');
        Route::delete('/dashboard/comments/{comment}/destroy', 'destroy')->name('dashboard.comments.destroy');
    });

    Route::controller(MessageController::class)->group(function () {
        Route::get('/dashboard/messages', 'index')->name('dashboard.messages.view');
    });

    Route::get('/notification/{notification}', [NotificationController::class, 'markAsRead'])->name('dashboard.notification.markAsRead');
});
