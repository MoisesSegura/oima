<?php

use App\Http\Livewire\Form;
use App\Livewire\CreatePost;
use Illuminate\Support\Facades\Route;

Route::get('form', Form::class);

// Route::get('posts/create', CreatePost::class);

// Route::resource('posts', \App\Http\Controllers\PostController::class)
// ->only('create', 'store');
