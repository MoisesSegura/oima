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
        
        $countries = $this->getCountries();
        $regions = $this->getRegions();

        return view('legumbres', compact('countries','regions'));
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
        $fruits = DB::table('product_detail')
        ->select('product_id', DB::raw('MAX(id) as id'), DB::raw('MAX(known_name) as known_name'))
        ->groupBy('product_id')
        ->whereIn('product_id', function ($query) {
            $query->select('id')
                ->from('product')
                ->where('category_id', 3);
        })
        ->get();

    return $fruits;
    }


    public function getVegetables()
    {

        $vegetables = DB::table('product_detail')
        ->select('product_id', DB::raw('MAX(id) as id'), DB::raw('MAX(known_name) as known_name'))
        ->groupBy('product_id')
        ->whereIn('product_id', function ($query) {
            $query->select('id')
                ->from('product')
                ->where('category_id', 4);
        })
        ->get();

    return $vegetables;
    }

    public function getGrains()
    {

        $grains = DB::table('product_detail')
        ->select('product_id', DB::raw('MAX(id) as id'), DB::raw('MAX(known_name) as known_name'))
        ->groupBy('product_id')
        ->whereIn('product_id', function ($query) {
            $query->select('id')
                ->from('product')
                ->where('category_id', 5);
        })
        ->get();

    return $grains;
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

public function filterProducts(Request $request)
{
    // Aquí debes escribir la lógica para filtrar productos
    // usando los valores de $request->region y $request->country

    // Devuelve los productos filtrados, por ejemplo:
    $productosFiltrados = Product::where('region', $request->region)
        ->where('country', $request->country)
        ->get();

    // Devuelve la vista o los datos en el formato que desees
    return view('tu.vista', compact('productosFiltrados'));
}

}
