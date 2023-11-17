<?php

use App\Http\Livewire\Form;;
use Illuminate\Support\Facades\Route;

Route::get('form', Form::class);


//Route::get('/', [App\Http\Controllers\HomeController::class, 'Home'])->name('home');


Route::get('/home/{locale}', function ($locale = null) {
    if (isset($locale) && in_array($locale, config('app.languages'))) {
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('change-language');

Route::get('/', [App\Http\Controllers\HomeController::class, 'Home'])->name('home');


Route::get('/frutas', [App\Http\Controllers\CatalogController::class, 'Catalog'])->name('frutas');
Route::get('/hortalizas', [App\Http\Controllers\CatalogController::class, 'Vegetables'])->name('hortalizas');
Route::get('/granos', [App\Http\Controllers\CatalogController::class, 'Grains'])->name('granos');
Route::get('/legumbres', [App\Http\Controllers\CatalogController::class, 'Legumes'])->name('legumbres');

Route::get('/get-countries/{regionId}', [App\Http\Controllers\CatalogController::class, 'getCountriesByRegion']);
Route::get('/filter-products',  [App\Http\Controllers\CatalogController::class, 'filterProducts'])->name('filterProducts');
Route::get('/producto/{id}', [App\Http\Controllers\CatalogController::class, 'showProduct'])->name('verProducto');
Route::get('/requisitos/{id}', [App\Http\Controllers\CatalogController::class, 'showRequirements'])->name('verRequisitos');
Route::get('/infoAgronomica/{id}', [App\Http\Controllers\CatalogController::class, 'showAgronomic'])->name('verInfoAgronomica');
Route::get('/infoNutricional/{id}', [App\Http\Controllers\CatalogController::class, 'showNutrition'])->name('verInfoNutricional');

Route::get('/contacto', [App\Http\Controllers\ContactController::class, 'Contact'])->name('contacto');
Route::post('/enviar-mensaje', 'ContactController@enviarMensaje');

Route::get('/eventos', [App\Http\Controllers\BlogController::class, 'Events'])->name('eventos');
Route::get('/noticias', [App\Http\Controllers\BlogController::class, 'News'])->name('noticias');
Route::get('/sima-media', [App\Http\Controllers\BlogController::class, 'SimaMedia'])->name('sima-media');
Route::get('/eventos/{id}', [App\Http\Controllers\BlogController::class,'showEvent'])->name('showEvent');
Route::get('/noticias/{id}', [App\Http\Controllers\BlogController::class,'showNew'])->name('showNew');
Route::get('/sima-media/{id}', [App\Http\Controllers\BlogController::class,'showSimaMedia'])->name('showSimaMedia');



// Route::get('/eventi', function () {
//     return view('verEvento');
// })->name('eventi');






