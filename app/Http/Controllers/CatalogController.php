<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Country;
use App\Models\Region;
use App\Models\ProductDetail;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function Catalog(Request $request){
        
        $fruits = $this->getFruits();
        $countries = $this->getCountries();
        $regions = $this->getRegions();

        return view('frutas', compact('fruits','countries','regions'));
    }


    public function Vegetables(Request $request){
        
        $vegetables = $this->getVegetables();
        $countries = $this->getCountries();
        $regions = $this->getRegions();

        return view('hortalizas', compact('vegetables','countries','regions'));
    }

    public function Grains(Request $request){
        
        $grains = $this->getGrains();
        $countries = $this->getCountries();
        $regions = $this->getRegions();

        return view('granos', compact('grains','countries','regions'));
    }

    public function Legumes(Request $request){
        
        $legumes = $this->getLegumes();
        $countries = $this->getCountries();
        $regions = $this->getRegions();

        return view('legumbres', compact('countries','regions','legumes'));
    }



    // public function getFruits()
    // {

    //     $fruits = Product::whereHas('category', function ($query) {
    //         $query->where('category_id', '3');
    //     })->get();

    //     return $fruits;
    // }

    public function getFruits()
    {
        $fruits = ProductDetail::select(
            'product_detail.product_id', 
            DB::raw('MAX(product_detail.id) as max_id'), 
            DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR "-") as concatenated_known_names')
        )
        ->groupBy('product_detail.product_id')
        ->whereIn('product_detail.product_id', function ($query) {
            $query->select('product.id')
                ->from('product')
                ->join('product_category', 'product.category_id', '=', 'product_category.id')
                ->where('product_category.slug', 'Frutas');
        })
        ->get();

    return $fruits;
    }


    public function getVegetables()
    {

        $vegetables = ProductDetail::select(
            'product_detail.product_id', 
            DB::raw('MAX(product_detail.id) as max_id'), 
            DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR "-") as concatenated_known_names')
        )
        ->groupBy('product_detail.product_id')
        ->whereIn('product_detail.product_id', function ($query) {
            $query->select('product.id')
                ->from('product')
                ->join('product_category', 'product.category_id', '=', 'product_category.id')
                ->where('product_category.slug', 'Hortalizas');
        })
        ->get();

    return $vegetables;
    }

    public function getGrains()
    {

        $grains = ProductDetail::select(
            'product_detail.product_id', 
            DB::raw('MAX(product_detail.id) as max_id'), 
            DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR "-") as concatenated_known_names')
        )
        ->groupBy('product_detail.product_id')
        ->whereIn('product_detail.product_id', function ($query) {
            $query->select('product.id')
                ->from('product')
                ->join('product_category', 'product.category_id', '=', 'product_category.id')
                ->where('product_category.slug', 'Granos');
        })
        ->get();

    return $grains;
    }


    public function getLegumes()
    {

        $legumes = ProductDetail::select(
            'product_detail.product_id', 
            DB::raw('MAX(product_detail.id) as max_id'), 
            DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR "-") as concatenated_known_names')
        )
        ->groupBy('product_detail.product_id')
        ->whereIn('product_detail.product_id', function ($query) {
            $query->select('product.id')
                ->from('product')
                ->join('product_category', 'product.category_id', '=', 'product_category.id')
                ->where('product_category.slug', 'Legumbres');
        })
        ->get();

    return $legumes;
    }

    public function showProduct($id)
    {
        $product = ProductDetail::findOrFail($id);
     
        return view('verProducto', compact('product'));
    }

    public function showRequirements($id)
    {

        // Obtener el objeto ProductDetail por su ID
        $productDetail = ProductDetail::findOrFail($id);
    
        // Obtener el requisito asociado al ProductDetail
        $requirement = $productDetail->impRequirement;
    
        // Verificar si existe el requisito
        if ($requirement) {
            // Obtener los contenidos asociados al requisito
            $contents = $requirement->expImpContent;
            $links = $requirement->Links;
    
            return view('verRequisitos', compact('contents','productDetail','links'));
        } else {
            // Manejar el caso en que no haya requisito asociado
            return view('verRequisitos');
        }
    }

    public function showAgronomic($id)
    {
  // Obtener el objeto ProductDetail por su ID
  $productDetail = ProductDetail::findOrFail($id);

  // Obtener la colección de información agronómica asociada al ProductDetail
  $agronomicInformations = $productDetail->agronomics;

  // Verificar si existe información agronómica
  if ($agronomicInformations->isNotEmpty()) {
      
      return view('verInfoAgronomica', compact('agronomicInformations','productDetail'));
  } else {
      // Manejar el caso en que no haya información agronómica asociada
      return view('verInfoAgronomica');
  }
    }

    public function showNutrition($id)
    {
        // Obtén la instancia de ProductDetail por ID
        $productDetail = ProductDetail::find($id);

        // Verificar si la instancia de ProductDetail existe
        if ($productDetail) {
            // Accede a los modelos relacionados
            $nutritionalProperties = $productDetail->nutritionalProperty;
            $nutritionalContents = $productDetail->nutritionalContent;


            // devolverlos a la vista
            return view('verInfoNutricional', compact('nutritionalProperties', 'nutritionalContents','productDetail'));
        } else {
            // Manejar el caso en el que no se encuentre el ProductDetail con el ID dado

            return redirect()->route('verInfoNutricional');
        }
    }

    public function showGallery($id)
    {
        //instancia de ProductDetail por ID
    $productDetail = ProductDetail::find($id);

    // Verificar si la instancia de ProductDetail existe
    if ($productDetail) {
        // Accede a la relación de galerías
        $galleries = $productDetail->galleries;

        // devolver las galerías a la vista
        return view('verGaleria', compact('galleries', 'productDetail'));
    } else {
        // Manejar el caso en el que no se encuentre el ProductDetail con el ID dado
        return redirect()->route('verGaleria');
    }
    }
    
    

    public function getCountries()
    {
        return Country::all();
    }

    public function getRegions()
    {
        return Region::all();
    }


    public function getCountriesByRegion($regionId)
{
    $countries = Country::where('region_id', $regionId)->pluck('name', 'id');

    return response()->json($countries);
}



// public function getFruits()
// {
//     $fruits = ProductDetail::select('product_detail.product_id', 'product_detail.id', 'product_detail.known_name')
//     ->groupBy('product_detail.product_id', 'product_detail.id', 'product_detail.known_name')
//     ->whereIn('product_detail.product_id', function ($query) {
//         $query->select('product.id')
//             ->from('product')
//             ->join('product_category', 'product.category_id', '=', 'product_category.id')
//             ->where('product_category.slug', 'Frutas');
//     })
//     ->get();

// return $fruits;
// }

public function filterProducts(Request $request)
{
    $categoryId = 3; // Assuming 'Frutas' category, change as needed

    $query = ProductDetail::query()
        ->select('product_detail.product_id', 'product_detail.id', 'product_detail.known_name')
        ->groupBy('product_detail.product_id', 'product_detail.id', 'product_detail.known_name')
        ->whereIn('product_detail.product_id', function ($subquery) use ($categoryId) {
            $subquery->select('product.id')
                ->from('product')
                ->join('product_category', 'product.category_id', '=', 'product_category.id')
                ->where('product_category.id', $categoryId);
        });


    if ($request->has('country')) {
        $countryId = $request->input('country');
        $query->whereHas('product', function ($subquery) use ($countryId) {
            $subquery->where('country_id', $countryId);
        });
    }

    if ($request->has('name')) {
        $name = $request->input('name');
        $query->where('known_name', 'LIKE', "%$name%"); // Adjust as needed
    }

    $filteredProducts = $query->get();

    // Return the results or pass them to a view
    return view('frutas', compact('filteredProducts'));
}

}
