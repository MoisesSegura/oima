<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Achievement;
use App\Models\Organization;
use App\Models\History;
use App\Models\SiteText;
use App\Models\Event;
use App\Models\OimaNew;
use App\Models\SimaMedia;
use App\Models\Extra;
use App\Models\AdditionalTool;
use App\Models\Statistic;
use App\Models\Region;
class HomeController extends Controller
{
    
    public function Home(Request $request){

        
        $organizations = Organization::all();

        $achievements = $this->getAchievements();

        $site = $this->getSiteText();

        $events = $this->getEvents();

        $news = $this->getNews();

        $simas = $this->getSimaMedia();

        $extras = $this->getExtras();

        $tool = $this->getAdditionalTool();
        
        $stats = $this->getStatistic();

        $regions = Region::all();

        return view('home', compact('organizations', 'achievements','site','events','news','simas','extras','tool','stats','regions'));
    }

    public function getStatistic()
    {
        return Statistic::all();
    }


    public function getAchievements()
    {
        return Achievement::all();
    }

    public function getExtras()
    {
        $extra = Extra::first();

        if ($extra) {
            return $extra;
        }
    
        return null; 
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

    public function getAdditionalTool()
    {
        $tool = AdditionalTool::first();

    if ($tool) {
        return $tool;
    }

    return null; 
    }

    public function getEvents()
    {
        return Event::orderBy('id', 'desc')->take(10)->get();
    }

    public function getNews()
    {
        return OimaNew::orderBy('id', 'desc')->take(10)->get();
    }

    public function getSimaMedia()
    {
        return SimaMedia::orderBy('id', 'desc')->take(10)->get();
    }

    // public function Home(Request $request)
    // {
    //     $organizations = Organization::all();

    //     $achievements = $this->getAchievements();

    //     $products = $this->getProducts();

    //     return view('home', compact('organizations', 'achievements','products'));
    // }





}
