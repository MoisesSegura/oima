<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Presentation;
use App\Models\LaboralDocument;
use App\Models\Video;
use App\Models\ProcedureNorm;
use App\Models\ProductDetail;
use App\Models\Extra;
use Illuminate\Support\Facades\DB;

class RepositoryController extends Controller
{
  
    public function publications(Request $request){  //publicaciones y documentos tecnicos

    $totalPublications = LaboralDocument::count();

    $publications = Publication::orderByDesc('created_at')->take(6)->get();

    $totalDocuments = LaboralDocument::count();

    $documents = LaboralDocument::orderByDesc('created_at')->where('category', 1)->take(6)->get();

    $extras = $this->getExtras();
 
    return view('publicaciones', compact('publications','documents','extras','totalPublications', 'totalDocuments'));
    }

    public function showPublication($id)
    {
        $publication = Publication::findOrFail($id);

        return view('verPublicacion', compact('publication'));
    }

    public function presentations(Request $request){ //presentaciones y reportes regionales

   
     $totalPresentations = Presentation::count();

    
     $presentations = Presentation::orderByDesc('created_at')->take(6)->get();

     $totalDocuments = LaboralDocument::count();

     $reports = LaboralDocument::orderByDesc('created_at')->where('category', 2)->take(6)->get();

     $extras = $this->getExtras();

     return view('presentaciones', compact('presentations', 'totalPresentations','extras', 'reports','totalDocuments'));
    }

    public function technicalDocuments(Request $request){

        $totalDocuments = LaboralDocument::count();

        $documents = LaboralDocument::orderByDesc('created_at')->where('category', 1)->take(6)->get();

        $extras = $this->getExtras();

        return view('documentos-tecnicos', compact('documents','totalDocuments','extras'));
    }

    public function regionalReports(Request $request){

        $totalDocuments = LaboralDocument::count();

        $reports = LaboralDocument::orderByDesc('created_at')->where('category', 2)->take(6)->get();

        $extras = $this->getExtras();

        return view('informes-regionales', compact('reports','extras'));
    }


    public function dictionary()
    {
        $productsUnsorted = ProductDetail::select(
            'product_detail.product_id', 
            DB::raw('MAX(product_detail.id) as max_id'), 
            DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR ", ") as concatenated_known_names')
        )
        ->groupBy('product_detail.product_id')
        ->get();

        $products = $productsUnsorted->sortBy('product.name')->take(12);

        $extras = $this->getExtras();
    
        return  view('diccionario', compact('products','extras'));
    }

    public function showDictionary($id)
    {
        // Obtén el producto específico por su ID
        $product = ProductDetail::findOrFail($id);
    
        // Obtén todos los productos con el mismo product_id
        $relatedProducts = ProductDetail::select(
            'product_detail.product_id', 
            DB::raw('MAX(product_detail.id) as max_id'), 
            DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR ", ") as concatenated_known_names')
        )
        ->where('product_detail.product_id', $product->product_id)
        ->groupBy('product_detail.product_id')
        ->get();

        $countryNames = $this->getCountryProducts( $product->product_id);
    
        return view('verDiccionario', compact('product', 'relatedProducts','countryNames'));
    }


    public function getCountryProducts($product_id)
{
    $products = ProductDetail::select(
        'product_detail.product_id', 
        'product_detail.country_id',
        'country.name as country_name',
        'info_country.iso as country_iso', // Agregar el campo iso
        DB::raw('MAX(product_detail.id) as max_id'), 
        DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR ", ") as concatenated_known_names')
    )
    ->join('country', 'product_detail.country_id', '=', 'country.id')
    ->join('info_country', 'country.flag_id', '=', 'info_country.id') // Unir con info_country
    ->where('product_detail.product_id', $product_id) // Condición para el product_id específico
    ->groupBy('product_detail.product_id', 'product_detail.country_id', 'country.name', 'info_country.iso')
    ->orderBy('country.name') // Ordenar por el nombre del país
    ->get();

    return $products;
}

    

    public function videos(Request $request){

        $videos = Video::all()->sortByDesc('created_at');

        $extras = $this->getExtras();
     
        return view('videos', compact('videos','extras'));
    }
        
        
    public function procedureNorms(Request $request){

        $norms = ProcedureNorm::all()->sortByDesc('created_at');

        $extras = $this->getExtras();
         
        return view('normas-procedimientos', compact('norms','extras'));
    }


    public function getExtras()
    {
        $extra = Extra::first();

        if ($extra) {
            return $extra;
        }
    
        return null; 
    }



    //metodos pr obtener mas registros

    public function getMorePresentations(Request $request) //presentaciones e informes regionales
{
    try {
        $page = $request->input('page');
        $perPage = 6;

        // Calcula el número de saltos necesarios para obtener la página actual
        $skip = ($page - 1) * $perPage;

        // Obtén las presentaciones para la página actual
        $presentations = Presentation::orderByDesc('created_at')->skip($skip)->take($perPage)->get();

        $reports = LaboralDocument::orderByDesc('created_at')->where('category', 2)->skip($skip)->take($perPage)->get();

        return view('partials.presentations&reports', compact('presentations','reports'))->render();
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


public function getMoreDocuments(Request $request)   //publicaciones y documentos tecnicos
{
    try {
        $page = $request->input('page');
        $perPage = 6;

        $skip = ($page - 1) * $perPage;

        $documents = LaboralDocument::orderByDesc('created_at')->where('category', 1)->skip($skip)->take($perPage)->get();

        $publications = Publication::orderByDesc('created_at')->skip($skip)->take($perPage)->get();

        return view('partials.publications&documents', compact('documents','publications'))->render();
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function getMoreReports(Request $request)
{
    try {
        $page = $request->input('page');
        $perPage = 6;

      
        $skip = ($page - 1) * $perPage;

        $documents = LaboralDocument::orderByDesc('created_at')->where('category', 2)->skip($skip)->take($perPage)->get();

        return view('partials.documents', compact('documents'))->render();
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


public function getMoreDictionaries(Request $request)
{
    $page = $request->input('page');
    $perPage = 12;

    // Calcula el número de saltos necesarios para obtener la página actual
    $skip = ($page - 1) * $perPage;

    $productsUnsorted = ProductDetail::select(
        'product_detail.product_id', 
        DB::raw('MAX(product_detail.id) as max_id'), 
        DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR ", ") as concatenated_known_names')
    )
    ->groupBy('product_detail.product_id')
    ->get();

    // Aplica el mismo orden que en el método original
    $products = $productsUnsorted->sortBy('product.name')  ->skip($skip)
    ->take($perPage);

    return view('partials.dictionaries')->with('products', $products)->render();
}


public function buscarProductos(Request $request)
{
    $nombreProducto = $request->input('name');

    $productosUnsorted = ProductDetail::select(
        'product_detail.product_id', 
        DB::raw('MAX(product_detail.id) as max_id'), 
        DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR ", ") as concatenated_known_names')
    )
    ->leftJoin('product_translation', 'product_detail.product_id', '=', 'product_translation.product_id')
    ->where('product_translation.name', 'LIKE', '%' . $nombreProducto . '%')
    ->groupBy('product_detail.product_id')
    ->get();

    $products = $productosUnsorted->sortBy('product_translation.name');

    $extras = $this->getExtras();

    return view('diccionario', compact('products', 'extras'));
}

public function buscarVideos(Request $request)
{
    $nombreVideo = $request->input('name');

    $idioma =  app()->getLocale();

    $videosUnsorted = Video::select(
        'video.id',
        'video_translation.name',
        'video_translation.description',
      
    )
    ->leftJoin('video_translation', function ($join) use ($idioma) {
        $join->on('video.id', '=', 'video_translation.video_id')
             ->where('video_translation.locale', '=', $idioma);
    })
    ->where('video_translation.name', 'LIKE', '%' . $nombreVideo . '%')
    ->groupBy('video.id','video_translation.name','video_translation.description')
    ->get();

    $videos = $videosUnsorted->sortBy('video_translation.name');

    $extras = $this->getExtras();

    return view('videos', compact('videos', 'extras'));
}

public function buscarNormas(Request $request)
{
    $nombreNorma = $request->input('name');

    $idioma =  app()->getLocale();

    $normsUnsorted = ProcedureNorm::select(
        'procedure_norm.id',
        'procedure_norm_translation.name',
        'procedure_norm_translation.file_real',
        'procedure_norm_translation.file_real_name',
      
    )
    ->leftJoin('procedure_norm_translation', function ($join) use ($idioma) {
        $join->on('procedure_norm.id', '=', 'procedure_norm_translation.procedure_norm_id')
             ->where('procedure_norm_translation.locale', '=', $idioma);
    })
    ->where('procedure_norm_translation.name', 'LIKE', '%' . $nombreNorma . '%')
    ->groupBy('procedure_norm.id','procedure_norm_translation.name','procedure_norm_translation.file_real', 'procedure_norm_translation.file_real_name')
    ->get();

    $norms = $normsUnsorted->sortBy('procedure_norm_translation.name');

    $extras = $this->getExtras();

    return view('normas-procedimientos', compact('norms', 'extras'));
}

public function buscarPublicacionesDocumentos(Request $request)
{
    $nombre = $request->input('name');

    $idioma =  app()->getLocale();

    $publicUnsorted = Publication::select(
        'publication.id',
        'publication_translation.image',
        'publication_translation.title',
        'publication_translation.file_real',
        'publication_translation.file_real_name',
      
    )
    ->leftJoin('publication_translation', function ($join) use ($idioma) {
        $join->on('publication.id', '=', 'publication_translation.publication_id')
             ->where('publication_translation.locale', '=', $idioma);
    })
    ->where('publication_translation.title', 'LIKE', '%' . $nombre . '%')
    ->groupBy('publication.id','publication_translation.image','publication_translation.title', 'publication_translation.file_real'
    , 'publication_translation.file_real_name')
    ->get();

    $publications = $publicUnsorted->sortBy('publication_translation.title');

    
    $documentUnsorted = LaboralDocument::select(
        'laboral_document.id',
        'laboral_document.author',
        'laboral_document.place',
        'laboral_document_translation.title',
        'laboral_document_translation.file_real',
        'laboral_document_translation.file_real_name',
      
    )
    ->leftJoin('laboral_document_translation', function ($join) use ($idioma) {
        $join->on('laboral_document.id', '=', 'laboral_document_translation.laboral_document_id')
             ->where('laboral_document_translation.locale', '=', $idioma);
    })
    ->where('laboral_document_translation.title', 'LIKE', '%' . $nombre . '%')
    ->groupBy('laboral_document.id', 'laboral_document.author','laboral_document.place','laboral_document_translation.title', 'laboral_document_translation.file_real'
    , 'laboral_document_translation.file_real_name')->where('laboral_document.category', 1)
    ->get();

    $documents = $documentUnsorted->sortBy('laboral_document_translation.title');

    $extras = $this->getExtras();

    return view('publicaciones', compact('publications', 'documents','extras'));
}




public function buscarPresentacionesInformes(Request $request)
{
    $nombre = $request->input('name');

    $idioma =  app()->getLocale();

    $PresUnsorted = Presentation::select(
        'presentation.id',
        'presentation.image',
        'presentation.author',
        'presentation_translation.title',
        'presentation_translation.file_real',
        'presentation_translation.file_real_name',
      
    )
    ->leftJoin('presentation_translation', function ($join) use ($idioma) {
        $join->on('presentation.id', '=', 'presentation_translation.presentation_id')
             ->where('presentation_translation.locale', '=', $idioma);
    })
    ->where('presentation_translation.title', 'LIKE', '%' . $nombre . '%')
    ->groupBy('presentation.id','presentation.image',  'presentation.author','presentation_translation.title', 'presentation_translation.file_real', 'presentation_translation.file_real_name')
    ->get();

    $presentations = $PresUnsorted->sortBy('presentation_translation.title');

    
    $documentUnsorted = LaboralDocument::select(
        'laboral_document.id',
        'laboral_document.author',
        'laboral_document.place',
        'laboral_document_translation.title',
        'laboral_document_translation.file_real',
        'laboral_document_translation.file_real_name',
      
    )
    ->leftJoin('laboral_document_translation', function ($join) use ($idioma) {
        $join->on('laboral_document.id', '=', 'laboral_document_translation.laboral_document_id')
             ->where('laboral_document_translation.locale', '=', $idioma);
    })
    ->where('laboral_document_translation.title', 'LIKE', '%' . $nombre . '%')
    ->groupBy('laboral_document.id', 'laboral_document.author','laboral_document.place','laboral_document_translation.title', 'laboral_document_translation.file_real'
    , 'laboral_document_translation.file_real_name')->where('laboral_document.category', 2)
    ->get();

    $reports = $documentUnsorted->sortBy('laboral_document_translation.title');

    $extras = $this->getExtras();

    return view('presentaciones', compact('presentations', 'reports','extras'));
}


}
