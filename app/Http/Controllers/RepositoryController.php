<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication;
use App\Models\Presentation;
use App\Models\LaboralDocument;
use App\Models\Video;
use App\Models\ProcedureNorm;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\DB;

class RepositoryController extends Controller
{
    public function publications(Request $request){

    $publications = Publication::all();
 
    return view('publicaciones', compact('publications'));
    }

    public function showPublication($id)
    {
        $publication = Publication::findOrFail($id);

        return view('verPublicacion', compact('publication'));
    }

    public function presentations(Request $request){

        $presentations = Presentation::all()->sortByDesc('created_at');

        return view('presentaciones', compact('presentations'));
    }

    public function technicalDocuments(Request $request){

        $documents = LaboralDocument::where('category', 1)->get()->sortByDesc('created_at');

        return view('documentos-tecnicos', compact('documents'));
    }

    public function regionalReports(Request $request){

        $reports = LaboralDocument::where('category', 2)->get()->sortByDesc('created_at');

        return view('informes-regionales', compact('reports'));
    }


    public function dictionary()
    {
        $products = ProductDetail::select(
            'product_detail.product_id', 
            DB::raw('MAX(product_detail.id) as max_id'), 
            DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR ", ") as concatenated_known_names')
        )
        ->groupBy('product_detail.product_id')
        ->get();
    
        return  view('diccionario', compact('products'));
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
    
        return view('verDiccionario', compact('product', 'relatedProducts'));
    }
    

    public function videos(Request $request){

        $videos = Video::all()->sortByDesc('created_at');
     
        return view('videos', compact('videos'));
    }
        
        
    public function procedureNorms(Request $request){

        $norms = ProcedureNorm::all()->sortByDesc('created_at');
         
        return view('normas-procedimientos', compact('norms'));
    }



}
