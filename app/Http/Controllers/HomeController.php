<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Achievement;
use App\Models\Organization;
use App\Models\AchievementTranslation;
use App\Models\Product;
use App\Models\History;
use App\Models\SiteText;

class HomeController extends Controller
{
    
    public function Home(Request $request){

        
        $organizations = Organization::all();

        $achievements = $this->getAchievements();

        $site = $this->getSiteText();

        return view('home', compact('organizations', 'achievements','site'));
    }


    public function getAchievements()
    {
        return Achievement::all();
    }

    public function getProducts()
    {
        return Product::all();
    }

    public function getHistory()
    {
        $history = History::first();

    if ($history) {
        return $history;
    }

    return null; 
    }

    public function getSiteText()
    {
        $site = SiteText::first();

    if ($site) {
        return $site;
    }

    return null; 
    }

    // public function Home(Request $request)
    // {
    //     $organizations = Organization::all();

    //     $achievements = $this->getAchievements();

    //     $products = $this->getProducts();

    //     return view('home', compact('organizations', 'achievements','products'));
    // }





}
