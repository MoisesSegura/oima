<?php

use App\Http\Livewire\Form;;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepositoryController;

// Route::get('form', Form::class);


//Route::get('/', [App\Http\Controllers\HomeController::class, 'Home'])->name('home');


// Route::get('/change-language/{locale}', function ($locale = null) {
//     if (isset($locale) && in_array($locale, config('app.languages'))) {
//         app()->setLocale($locale);
//     }
//     return redirect()->back();
// })->name('change-language');

Route::get('/locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
 
})->name('locale');;




Route::get('/', [App\Http\Controllers\HomeController::class, 'Home'])->name('home');


Route::get('/frutas', [App\Http\Controllers\CatalogController::class, 'Catalog'])->name('frutas');
Route::get('/hortalizas', [App\Http\Controllers\CatalogController::class, 'Vegetables'])->name('hortalizas');
Route::get('/granos', [App\Http\Controllers\CatalogController::class, 'Grains'])->name('granos');
Route::get('/legumbres', [App\Http\Controllers\CatalogController::class, 'Legumes'])->name('legumbres');

Route::get('/filter-fruits', [App\Http\Controllers\CatalogController::class, 'filterFruits'])->name('filterFruits');
Route::get('/filter-vegetables', [App\Http\Controllers\CatalogController::class, 'filterVegetables'])->name('filterVegetables');
Route::get('/filter-grains', [App\Http\Controllers\CatalogController::class, 'filterGrains'])->name('filterGrains');
Route::get('/filter-pulses', [App\Http\Controllers\CatalogController::class, 'filterPulses'])->name('filterPulses');
Route::get('/buscar-frutas', [App\Http\Controllers\CatalogController::class, 'searchFruits'])->name('buscarFrutas');
Route::get('/buscar-hortalizas', [App\Http\Controllers\CatalogController::class, 'searchVegetables'])->name('buscarHortalizas');
Route::get('/buscar-granos', [App\Http\Controllers\CatalogController::class, 'searchGrains'])->name('buscarGranos');
Route::get('/buscar-legumbres', [App\Http\Controllers\CatalogController::class, 'searchLegumes'])->name('buscarLegumbres');

Route::get('/oima', [App\Http\Controllers\oimaController::class, 'oima'])->name('oima');
Route::get('/oima-funcionamiento', [App\Http\Controllers\oimaController::class, 'oimaFuncionamiento'])->name('oima-funcionamiento');
Route::get('/quienes-somos', [App\Http\Controllers\oimaController::class, 'quienesSomos'])->name('quienes');
Route::get('/organizacion/{id}', [App\Http\Controllers\oimaController::class,'showOrganization'])->name('verOrganizacion');
Route::get('/historia', [App\Http\Controllers\oimaController::class, 'history'])->name('historia');

Route::get('/get-countries/{regionId}', [App\Http\Controllers\CatalogController::class, 'getCountriesByRegion']);
Route::get('/filter-products',  [App\Http\Controllers\CatalogController::class, 'filterProducts'])->name('filterProducts');
Route::get('/producto/{id}', [App\Http\Controllers\CatalogController::class, 'showProduct'])->name('verProducto');
Route::get('/requisitos/{id}', [App\Http\Controllers\CatalogController::class, 'showRequirements'])->name('verRequisitos');
Route::get('/infoAgronomica/{id}', [App\Http\Controllers\CatalogController::class, 'showAgronomic'])->name('verInfoAgronomica');
Route::get('/infoNutricional/{id}', [App\Http\Controllers\CatalogController::class, 'showNutrition'])->name('verInfoNutricional');
Route::get('/galeria/{id}', [App\Http\Controllers\CatalogController::class, 'showGallery'])->name('verGaleria');

Route::get('/contacto', [App\Http\Controllers\ContactController::class, 'Contact'])->name('contacto');
// Route::post('/enviar-mensaje', 'ContactController@enviarMensaje');

Route::get('/eventos', [App\Http\Controllers\BlogController::class, 'Events'])->name('eventos');
Route::get('/noticias', [App\Http\Controllers\BlogController::class, 'News'])->name('noticias');
Route::get('/sima-media', [App\Http\Controllers\BlogController::class, 'SimaMedia'])->name('sima-media');
Route::get('/eventos/{id}', [App\Http\Controllers\BlogController::class,'showEvent'])->name('showEvent');
Route::get('/noticias/{id}', [App\Http\Controllers\BlogController::class,'showNew'])->name('showNew');
Route::get('/sima-media/{id}', [App\Http\Controllers\BlogController::class,'showSimaMedia'])->name('showSimaMedia');
// Route::get('/eventos/ajax', [App\Http\Controllers\BlogController::class,'getEventsByYear'])->name('eventos.ajax');
Route::get('/filter-events',  [App\Http\Controllers\BlogController::class,'filterEvents'])->name('filter.events');
Route::get('/filter-news',  [App\Http\Controllers\BlogController::class,'filterNews'])->name('filter.news');
Route::get('/filter-media',  [App\Http\Controllers\BlogController::class,'filterMedia'])->name('filter.media');

Route::get('/filter-events-by-name', [App\Http\Controllers\BlogController::class,'filterEventsByName'])->name('filter.events.by.name');
Route::get('/filter-news-by-name', [App\Http\Controllers\BlogController::class,'filterNewsByName'])->name('filter.news.by.name');
Route::get('/filter-courses-by-name', [App\Http\Controllers\BlogController::class,'filterCoursesByName'])->name('filter.courses.by.name');


Route::get('/publicaciones', [App\Http\Controllers\RepositoryController::class, 'publications'])->name('publicaciones');
Route::get('/publicaciones/{id}', [App\Http\Controllers\RepositoryController::class, 'showPublication'])->name('verPublicacion');
Route::get('/presentaciones', [App\Http\Controllers\RepositoryController::class, 'presentations'])->name('presentaciones');
Route::get('/documentos-tecnicos', [App\Http\Controllers\RepositoryController::class, 'technicalDocuments'])->name('documentos-tecnicos');
Route::get('/informes-regionales', [App\Http\Controllers\RepositoryController::class, 'regionalReports'])->name('informes-regionales');
Route::get('/diccionario', [App\Http\Controllers\RepositoryController::class, 'dictionary'])->name('diccionario');
Route::get('/diccionario/{id}', [App\Http\Controllers\RepositoryController::class, 'showDictionary'])->name('verDiccionario');
Route::get('/videos', [App\Http\Controllers\RepositoryController::class, 'videos'])->name('videos');
Route::get('/normas-procedimientos', [App\Http\Controllers\RepositoryController::class, 'procedureNorms'])->name('normas-procedimientos');
Route::get('/buscar-productos',  [App\Http\Controllers\RepositoryController::class, 'buscarProductos'])->name('buscar.productos');
Route::get('/buscar-videos',  [App\Http\Controllers\RepositoryController::class, 'buscarVideos'])->name('buscar.videos');
Route::get('/buscar-normas',  [App\Http\Controllers\RepositoryController::class, 'buscarNormas'])->name('buscar.normas');
Route::get('/buscar-publicaciones-documentos',  [App\Http\Controllers\RepositoryController::class, 'buscarPublicacionesDocumentos'])->name('buscar.publicaciones.documentos');
Route::get('/buscar-presentaciones-informes',  [App\Http\Controllers\RepositoryController::class, 'buscarPresentacionesInformes'])->name('buscar.presentaciones.informes');

Route::get('/get-more-presentations', [RepositoryController::class, 'getMorePresentations'])->name('getMorePresentations');
Route::get('/get-more-documents', [RepositoryController::class, 'getMoreDocuments'])->name('getMoreDocuments');
Route::get('/get-more-reports', [RepositoryController::class, 'getMoreReports'])->name('getMoreReports');
Route::get('/get-more-dictionaries', [RepositoryController::class, 'getMoreDictionaries'])->name('getMoreDictionaries');









// Route::get('/eventi', function () {
//     return view('verEvento');
// })->name('eventi');






