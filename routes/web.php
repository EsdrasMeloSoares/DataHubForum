<?php

use App\Livewire\Users\Index as UsersIndex;
use App\Livewire\Posts\Index as PostsIndex;
use App\Livewire\Post\Show as PostShow;
use App\Livewire\User\Profile;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome')->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/users', UsersIndex::class)->name('users.index');
    Route::get('/posts', PostsIndex::class)->name('posts.index');

    Route::get('/post/{post}', PostShow::class)->name('post.show');

    Route::get('/user/profile', Profile::class)->name('user.profile');
});

require __DIR__ . '/auth.php';
