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
    public function publications(Request $request){

    $publications = Publication::all();

    $extras = $this->getExtras();
 
    return view('publicaciones', compact('publications','extras'));
    }

    public function showPublication($id)
    {
        $publication = Publication::findOrFail($id);

        return view('verPublicacion', compact('publication'));
    }

    public function presentations(Request $request){

     // Obtén el número total de presentaciones
     $totalPresentations = Presentation::count();

     // Obtén la primera página de presentaciones
     $presentations = Presentation::orderByDesc('created_at')->take(6)->get();

     $extras = $this->getExtras();

     return view('presentaciones', compact('presentations', 'totalPresentations','extras'));
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

    public function getMorePresentations(Request $request)
{
    try {
        $page = $request->input('page');
        $perPage = 6;

        // Calcula el número de saltos necesarios para obtener la página actual
        $skip = ($page - 1) * $perPage;

        // Obtén las presentaciones para la página actual
        $presentations = Presentation::orderByDesc('created_at')->skip($skip)->take($perPage)->get();

        return view('partials.presentations', compact('presentations'))->render();
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


public function getMoreDocuments(Request $request)
{
    try {
        $page = $request->input('page');
        $perPage = 6;

        $skip = ($page - 1) * $perPage;

        $documents = LaboralDocument::orderByDesc('created_at')->where('category', 1)->skip($skip)->take($perPage)->get();

        return view('partials.documents', compact('documents'))->render();
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


}
