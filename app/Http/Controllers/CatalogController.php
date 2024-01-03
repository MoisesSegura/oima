<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Country;
use App\Models\InfoCountry;
use App\Models\Region;
use App\Models\ProductDetail;
use App\Models\Category;
use App\Models\ProductGraphic;
use App\Models\ProductDetailGraphicValue;
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



    public function getFruits()
    {
        $fruits = ProductDetail::select(
            'product_detail.product_id', 
            DB::raw('MAX(product_detail.id) as max_id'), 
            DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR ", ") as concatenated_known_names')
        )
        ->groupBy('product_detail.product_id')
        ->whereIn('product_detail.product_id', function ($query) {
            $query->select('product.id')
                ->from('product')
                ->join('product_category', 'product.category_id', '=', 'product_category.id')
                ->where('product_category.slug', 'Frutas');
        })
        ->get()->sortBy('product.name');

    return $fruits;
    }


    public function getVegetables()
    {

        $vegetables = ProductDetail::select(
            'product_detail.product_id', 
            DB::raw('MAX(product_detail.id) as max_id'), 
            DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR ", ") as concatenated_known_names')
        )
        ->groupBy('product_detail.product_id')
        ->whereIn('product_detail.product_id', function ($query) {
            $query->select('product.id')
                ->from('product')
                ->join('product_category', 'product.category_id', '=', 'product_category.id')
                ->where('product_category.slug', 'Hortalizas');
        })
        ->get()->sortBy('product.name');

    return $vegetables;
    }

    public function getGrains()
    {

        $grains = ProductDetail::select(
            'product_detail.product_id', 
            DB::raw('MAX(product_detail.id) as max_id'), 
            DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR ", ") as concatenated_known_names')
        )
        ->groupBy('product_detail.product_id')
        ->whereIn('product_detail.product_id', function ($query) {
            $query->select('product.id')
                ->from('product')
                ->join('product_category', 'product.category_id', '=', 'product_category.id')
                ->where('product_category.slug', 'Granos');
        })
        ->get()->sortBy('product.name');

    return $grains;
    }


    public function getLegumes()
    {

        $legumes = ProductDetail::select(
            'product_detail.product_id', 
            DB::raw('MAX(product_detail.id) as max_id'), 
            DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR ", ") as concatenated_known_names')
        )
        ->groupBy('product_detail.product_id')
        ->whereIn('product_detail.product_id', function ($query) {
            $query->select('product.id')
                ->from('product')
                ->join('product_category', 'product.category_id', '=', 'product_category.id')
                ->where('product_category.slug', 'Legumbres');
        })
        ->get()->sortBy('product.name');

    return $legumes;
    }

    public function showProduct($id)
    {
        $product = ProductDetail::findOrFail($id);

        $knownNames = $this->getCountryProducts($product->product_id);

        $graphic = ProductGraphic::where('product_detail_id', $product->id)->first();

        $regions = $this->getRegions();

        $countriesWithRegions = $this->getCountriesWithRegions($product);

        // Verificar si se encontró un registro de ProductGraphic
        if ($graphic) {
            // Acceder a los valores asociados a través de la relación definida en el modelo
            $values = $graphic->values;
    
            $puntos = [];
    
            foreach ($values as $value) {
                $puntos[] = ['name' => $value->month, 'y' => floatval($value->value)];
            }
    
            $data = json_encode($puntos);
        } else {
            // Manejar el caso en que no se encontró un registro de ProductGraphic
            $data = json_encode([]);
        }
     
        return view('verProducto', compact('product','knownNames','data','graphic', 'regions','countriesWithRegions'));
    }


    


    public function getCountryProducts($product_id)
    {
        $products = ProductDetail::select(
            'product_detail.product_id', 
            DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR ", ") as concatenated_known_names'),
            DB::raw('GROUP_CONCAT(DISTINCT country.name ORDER BY country.name SEPARATOR ", ") as concatenated_countries')
        )
        ->join('country', 'product_detail.country_id', '=', 'country.id')
        ->where('product_detail.product_id', $product_id) 
        ->groupBy('product_detail.product_id')
        ->orderBy('concatenated_countries') // Ordenar por la columna concatenada
        ->get();
    
        // Modificar la salida según tus necesidades
        $formattedProducts = [];
        foreach ($products as $product) {
            $formattedProduct = $product->concatenated_known_names;
            if ($product->concatenated_countries) {
                $formattedProduct .= ' (' . $product->concatenated_countries . ')';
            }
            $formattedProducts[] = $formattedProduct;
        }
    
        return $formattedProducts;
    }

    public function showRequirements($id)
    {

        $productDetail = ProductDetail::findOrFail($id);
    
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
            
            $nutritionalValues = $nutritionalProperties->flatMap(function ($nutritionalProperty) {
                return $nutritionalProperty->nutritionalPropertyValue;
            });
    


            // devolverlos a la vista
            return view('verInfoNutricional', compact('nutritionalProperties', 'nutritionalContents','nutritionalValues','productDetail'));
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

public function filterFruits(Request $request)
{
    // Obtener el parámetro de la solicitud
    $countryId = $request->input('country');

    // Realizar la consulta para obtener las frutas filtradas por país
    $filteredFruits = ProductDetail::with('product')
        ->where('product_detail.country_id', $countryId)
        ->whereHas('product', function ($query) {
            $query->whereHas('category', function ($query) {
                $query->where('slug', 'Frutas');
            });
        })
        ->get();

    return response()->json($filteredFruits);
}

public function filterVegetables(Request $request)
{
    // Obtener el parámetro de la solicitud
    $countryId = $request->input('country');

  
    $filteredFruits = ProductDetail::with('product')
        ->where('product_detail.country_id', $countryId)
        ->whereHas('product', function ($query) {
            $query->whereHas('category', function ($query) {
                $query->where('slug', 'Hortalizas');
            });
        })
        ->get();

    return response()->json($filteredFruits);
}

public function filterGrains(Request $request)
{
    // Obtener el parámetro de la solicitud
    $countryId = $request->input('country');

   
    $filteredFruits = ProductDetail::with('product')
        ->where('product_detail.country_id', $countryId)
        ->whereHas('product', function ($query) {
            $query->whereHas('category', function ($query) {
                $query->where('slug', 'Granos');
            });
        })
        ->get();

    return response()->json($filteredFruits);
}

public function filterPulses(Request $request)
{
    // Obtener el parámetro de la solicitud
    $countryId = $request->input('country');

    
    $filteredFruits = ProductDetail::with('product')
        ->where('product_detail.country_id', $countryId)
        ->whereHas('product', function ($query) {
            $query->whereHas('category', function ($query) {
                $query->where('slug', 'Legumbres');
            });
        })
        ->get();

    return response()->json($filteredFruits);
}


public function searchFruits(Request $request)
{
    // Obtener los parámetros de la solicitud
    $countryId = $request->input('country');
    $productName = $request->input('name');

    $productosUnsorted = ProductDetail::select(
        'product_detail.product_id', 
        DB::raw('MAX(product_detail.id) as max_id'), 
        DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR ", ") as concatenated_known_names')
    )
    ->leftJoin('product_translation', 'product_detail.product_id', '=', 'product_translation.product_id')
    ->where('product_translation.name', 'LIKE', '%' . $productName . '%')
    ->whereHas('product', function ($query) {
        $query->whereHas('category', function ($query) {
            $query->where('slug', 'Frutas');
        });
    })
    ->groupBy('product_detail.product_id')
    ->get();

    $fruits = $productosUnsorted->sortBy('product_translation.name');

        $regions = $this->getRegions();

    return view('frutas', compact('fruits','regions'));

}

public function searchVegetables(Request $request)
{
    // Obtener los parámetros de la solicitud
    $countryId = $request->input('country');
    $productName = $request->input('name');

    $productosUnsorted = ProductDetail::select(
        'product_detail.product_id', 
        DB::raw('MAX(product_detail.id) as max_id'), 
        DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR ", ") as concatenated_known_names')
    )
    ->leftJoin('product_translation', 'product_detail.product_id', '=', 'product_translation.product_id')
    ->where('product_translation.name', 'LIKE', '%' . $productName . '%')
    ->whereHas('product', function ($query) {
        $query->whereHas('category', function ($query) {
            $query->where('slug', 'Hortalizas');
        });
    })
    ->groupBy('product_detail.product_id')
    ->get();

    $vegetables = $productosUnsorted->sortBy('product_translation.name');

        $regions = $this->getRegions();

    return view('hortalizas', compact('vegetables','regions'));

}

public function searchGrains(Request $request)
{
    // Obtener los parámetros de la solicitud
    $countryId = $request->input('country');
    $productName = $request->input('name');

    $productosUnsorted = ProductDetail::select(
        'product_detail.product_id', 
        DB::raw('MAX(product_detail.id) as max_id'), 
        DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR ", ") as concatenated_known_names')
    )
    ->leftJoin('product_translation', 'product_detail.product_id', '=', 'product_translation.product_id')
    ->where('product_translation.name', 'LIKE', '%' . $productName . '%')
    ->whereHas('product', function ($query) {
        $query->whereHas('category', function ($query) {
            $query->where('slug', 'Granos');
        });
    })
    ->groupBy('product_detail.product_id')
    ->get();

    $grains = $productosUnsorted->sortBy('product_translation.name');

        $regions = $this->getRegions();

    return view('granos', compact('grains','regions'));

}

public function searchLegumes(Request $request)
{
    // Obtener los parámetros de la solicitud
    $countryId = $request->input('country');
    $productName = $request->input('name');

    $productosUnsorted = ProductDetail::select(
        'product_detail.product_id', 
        DB::raw('MAX(product_detail.id) as max_id'), 
        DB::raw('GROUP_CONCAT(DISTINCT product_detail.known_name SEPARATOR ", ") as concatenated_known_names')
    )
    ->leftJoin('product_translation', 'product_detail.product_id', '=', 'product_translation.product_id')
    ->where('product_translation.name', 'LIKE', '%' . $productName . '%')
    ->whereHas('product', function ($query) {
        $query->whereHas('category', function ($query) {
            $query->where('slug', 'Legumbres');
        });
    })
    ->groupBy('product_detail.product_id')
    ->get();

    $legumes = $productosUnsorted->sortBy('product_translation.name');

        $regions = $this->getRegions();

    return view('legumbres', compact('legumes','regions'));

}

public function getCountriesWithRegions($product)
{
    // Obtener el país asociado al producto
    $country = $product->country;

    // Verificar si se encontró un país asociado al producto
    if ($country) {
        // Obtener la región asociada al país
        $region = $country->region;

        $countriesWithRegions = [
            'country' => $country->name,
            'region' => $region ? $region->name : null,
        ];

        return [$countriesWithRegions];
    }

    return [];
}


}
