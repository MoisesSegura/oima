<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\OimaNew;
use App\Models\SimaMedia;
class BlogController extends Controller
{
    public function Events(Request $request){
        
        $events = Event::orderBy('year', 'desc')->get();
  
        return view('eventos', compact('events'));
    }

    public function News(Request $request){
        
        $news = OimaNew::orderBy('year', 'desc')->get();
  
        return view('noticias', compact('news'));
    }

    public function SimaMedia(Request $request){
        
        $simaMedias = SimaMedia::orderBy('year', 'desc')->get();
  
        return view('sima-media', compact('simaMedias'));
    }

    public function showEvent($id)
    {
        $event = Event::findOrFail($id);

        return view('verEvento', compact('event'));
    }

    public function showNew($id)
    {
        $new = OimaNew::findOrFail($id);

        return view('verNoticia', compact('new'));
    }

    public function showSimaMedia($id)
    {
        $simaMedia = SimaMedia::findOrFail($id);

        return view('verSimaMedia', compact('simaMedia'));
    }
}
