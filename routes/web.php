<?php

use App\Http\Livewire\Form;;
use Illuminate\Support\Facades\Route;

Route::get('form', Form::class);


//Route::get('/', [App\Http\Controllers\HomeController::class, 'Home'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'Home'])->name('home');

Route::get('/home/{locale}', function ($locale = null) {
    if (isset($locale) && in_array($locale, config('app.languages'))) {
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('change-language');





