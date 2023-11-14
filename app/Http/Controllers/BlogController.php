<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\OimaNew;
use App\Models\SimaMedia;
class BlogController extends Controller
{
    public function Events(Request $request){
        
        $events = Event::all();
        $news = OimaNew::all();
        $simaMedias = SimaMedia::all();
  
        return view('eventos', compact('events','news','simaMedias'));
    }

    public function News(Request $request){
        
        $news = OimaNew::all();
  
        return view('noticias', compact('news'));
    }

    public function SimaMedia(Request $request){
        
        $simaMedias = SimaMedia::all();
  
        return view('sima-media', compact('simaMedias'));
    }
}
