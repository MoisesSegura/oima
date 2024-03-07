<?php

use App\Http\Livewire\Form;;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\oimaController;
use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Mail;
use  App\Mail\EnviarCorreo;


Route::get('/locale/{locale}', function ($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
 
})->name('locale');;



Route::post('/enviar-correo', [ContactController::class, 'enviarCorreo'])->name('enviar-correo');

Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');

Route::get('/', [HomeController::class, 'Home'])->name('home');


Route::get('/catalogo', [CatalogController::class, 'catalogo'])->name('catalogo');
Route::get('/filtrar-productos', [CatalogController::class, 'filterProducts'])->name('filtrar-productos');
Route::get('/buscar-catalogo', [CatalogController::class, 'searchProducts'])->name('buscar-catalogo');

Route::get('/frutas', [CatalogController::class, 'Catalog'])->name('frutas');
Route::get('/hortalizas', [CatalogController::class, 'Vegetables'])->name('hortalizas');
Route::get('/granos', [CatalogController::class, 'Grains'])->name('granos');
Route::get('/legumbres', [CatalogController::class, 'Legumes'])->name('legumbres');

Route::get('/filter-fruits', [CatalogController::class, 'filterFruits'])->name('filterFruits');
Route::get('/filter-vegetables', [CatalogController::class, 'filterVegetables'])->name('filterVegetables');
Route::get('/filter-grains', [CatalogController::class, 'filterGrains'])->name('filterGrains');
Route::get('/filter-pulses', [CatalogController::class, 'filterPulses'])->name('filterPulses');
Route::get('/buscar-frutas', [CatalogController::class, 'searchFruits'])->name('buscarFrutas');
Route::get('/buscar-hortalizas', [CatalogController::class, 'searchVegetables'])->name('buscarHortalizas');
Route::get('/buscar-granos', [CatalogController::class, 'searchGrains'])->name('buscarGranos');
Route::get('/buscar-legumbres', [CatalogController::class, 'searchLegumes'])->name('buscarLegumbres');

Route::get('/get-countries-products/{product}', [CatalogController::class, 'getCountriesWithRegions']);


Route::get('/oima', [oimaController::class, 'oima'])->name('oima');
Route::get('/quienes-somos', [oimaController::class, 'quienesSomos'])->name('quienes');
Route::get('/organizacion/{id}', [oimaController::class,'showOrganization'])->name('verOrganizacion');
Route::get('/historia', [oimaController::class, 'history'])->name('historia');
Route::get('/delegaciones', [oimaController::class, 'delegaciones'])->name('delegaciones');

Route::get('/get-countries/{regionId}', [CatalogController::class, 'getCountriesByRegion'])->name('get-countries');
Route::get('/producto/{id}', [CatalogController::class, 'showProduct'])->name('verProducto');
Route::get('/requisitos/{id}', [CatalogController::class, 'showRequirements'])->name('verRequisitos');
Route::get('/infoAgronomica/{id}', [CatalogController::class, 'showAgronomic'])->name('verInfoAgronomica');
Route::get('/infoNutricional/{id}', [CatalogController::class, 'showNutrition'])->name('verInfoNutricional');
Route::get('/galeria/{id}', [CatalogController::class, 'showGallery'])->name('verGaleria');

Route::get('/contacto', [ContactController::class, 'Contact'])->name('contacto');


Route::get('/eventos', [BlogController::class, 'Events'])->name('eventos');
Route::get('/noticias', [BlogController::class, 'News'])->name('noticias');
Route::get('/sima-media', [BlogController::class, 'SimaMedia'])->name('sima-media');
Route::get('/eventos/{id}', [BlogController::class,'showEvent'])->name('showEvent');
Route::get('/noticias/{id}', [BlogController::class,'showNew'])->name('showNew');
Route::get('/sima-media/{id}', [BlogController::class,'showSimaMedia'])->name('showSimaMedia');
// Route::get('/eventos/ajax', [BlogController::class,'getEventsByYear'])->name('eventos.ajax');
Route::get('/filter-events',  [BlogController::class,'filterEvents'])->name('filter.events');
Route::get('/filter-news',  [BlogController::class,'filterNews'])->name('filter.news');
Route::get('/filter-media',  [BlogController::class,'filterMedia'])->name('filter.media');

Route::get('/filter-events-by-name', [BlogController::class,'filterEventsByName'])->name('filter.events.by.name');
Route::get('/filter-news-by-name', [BlogController::class,'filterNewsByName'])->name('filter.news.by.name');
Route::get('/filter-courses-by-name', [BlogController::class,'filterCoursesByName'])->name('filter.courses.by.name');


Route::get('/publicaciones', [RepositoryController::class, 'publications'])->name('publicaciones');
Route::get('/publicaciones/{id}', [RepositoryController::class, 'showPublication'])->name('verPublicacion');
Route::get('/presentaciones', [RepositoryController::class, 'presentations'])->name('presentaciones');
Route::get('/documentos-tecnicos', [RepositoryController::class, 'technicalDocuments'])->name('documentos-tecnicos');
Route::get('/informes-regionales', [RepositoryController::class, 'regionalReports'])->name('informes-regionales');
Route::get('/diccionario', [RepositoryController::class, 'dictionary'])->name('diccionario');
Route::get('/diccionario/{id}', [RepositoryController::class, 'showDictionary'])->name('verDiccionario');
Route::get('/videos', [RepositoryController::class, 'videos'])->name('videos');
Route::get('/normas-procedimientos', [RepositoryController::class, 'procedureNorms'])->name('normas-procedimientos');
Route::get('/buscar-productos',  [RepositoryController::class, 'buscarProductos'])->name('buscar.productos');
Route::get('/buscar-videos',  [RepositoryController::class, 'buscarVideos'])->name('buscar.videos');
Route::get('/buscar-normas',  [RepositoryController::class, 'buscarNormas'])->name('buscar.normas');
Route::get('/buscar-publicaciones-documentos',  [RepositoryController::class, 'buscarPublicacionesDocumentos'])->name('buscar.publicaciones.documentos');
Route::get('/buscar-presentaciones-informes',  [RepositoryController::class, 'buscarPresentacionesInformes'])->name('buscar.presentaciones.informes');
Route::get('/buscar-informes-regionales',  [RepositoryController::class, 'buscarInformesRegionales'])->name('buscar.informes');

Route::get('/filtrar-videos',  [RepositoryController::class,'filtrarVideos'])->name('filtrar-videos');
Route::get('/filtrar-presentaciones',  [RepositoryController::class,'filtrarPresentaciones'])->name('filtrar-presentaciones');
Route::get('/filtrar-informes',  [RepositoryController::class,'filtrarInformes'])->name('filtrar-informes');
Route::get('/filtrar-publicaciones',  [RepositoryController::class,'filtrarPublicaciones'])->name('filtrar-publicaciones');

Route::get('/get-more-presentations', [RepositoryController::class, 'getMorePresentations'])->name('getMorePresentations');
Route::get('/get-more-documents', [RepositoryController::class, 'getMoreDocuments'])->name('getMoreDocuments');
Route::get('/get-more-reports', [RepositoryController::class, 'getMoreReports'])->name('getMoreReports');
Route::get('/get-more-dictionaries', [RepositoryController::class, 'getMoreDictionaries'])->name('getMoreDictionaries');






