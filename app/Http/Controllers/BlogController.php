<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventTranslation;
use App\Models\OimaNew;
use App\Models\SimaMedia;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Astrotomic\Translatable\Translatable;

class BlogController extends Controller
{
    public function Events(Request $request)
    {

        $events = Event::orderBy('year', 'desc')->get();

        return view('eventos', compact('events'));
    }

    public function News(Request $request)
    {

        $news = OimaNew::orderBy('year', 'desc')->get();

        return view('noticias', compact('news'));
    }

    public function SimaMedia(Request $request)
    {

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

    public function filterEvents(Request $request)
    {
        $year = $request->input('year');

        $events = $year ? Event::where('year', $year)->get() : Event::all();

        $formattedEvents = $events->map(function ($event) {
            $event->start_formatted = Carbon::parse($event->start)->isoFormat('D [-] MMMM');
            return $event;
        });

        return response()->json($formattedEvents);
    }



    
    public function filterNews(Request $request)
    {
        $year = $request->input('year');

        $events = $year ? OimaNew::where('year', $year)->get() : OimaNew::all();

        $formattedEvents = $events->map(function ($event) {
            $event->start_formatted = Carbon::parse($event->start)->isoFormat('D [-] MMMM');
            return $event;
        });

        return response()->json($formattedEvents);
    }

    public function filterMedia(Request $request)
    {
        $year = $request->input('year');

        $events = $year ? SimaMedia::where('year', $year)->get() : SimaMedia::all();

        $formattedEvents = $events->map(function ($event) {
            $event->start_formatted = Carbon::parse($event->start)->isoFormat('D [-] MMMM');
            return $event;
        });

        return response()->json($formattedEvents);
    }

    public function filterEventsByName(Request $request)
    {
        $nombreEvento = $request->input('name');
    $idioma =  app()->getLocale();

    $eventosUnsorted = Event::select(
        'event.id',
        'event.image',
        'event_translation.name',
        'event_translation.description',
        'event_translation.address',
        'event_translation.duration'
    )
    ->leftJoin('event_translation', function ($join) use ($idioma) {
        $join->on('event.id', '=', 'event_translation.event_id')
             ->where('event_translation.locale', '=', $idioma);
    })
    ->where('event_translation.name', 'LIKE', '%' . $nombreEvento . '%')
    ->groupBy('event.id', 'event_translation.name', 'event_translation.description', 'event_translation.address', 'event_translation.duration', 'event.image')
    ->get();

    $events = $eventosUnsorted->sortBy('event_translation.name');

    return view('eventos', compact('events'));
    }

    public function filterNewsByName(Request $request)
    {
        $nombreNoticia = $request->input('name');
    $idioma =  app()->getLocale();

    $noticiasUnsorted = OimaNew::select(
        'oima_new.id',
        'oima_new.image',
        'oima_new.date',
        'oima_new_translation.title',
      
    )
    ->leftJoin('oima_new_translation', function ($join) use ($idioma) {
        $join->on('oima_new.id', '=', 'oima_new_translation.oima_new_id')
             ->where('oima_new_translation.locale', '=', $idioma);
    })
    ->where('oima_new_translation.title', 'LIKE', '%' . $nombreNoticia . '%')
    ->groupBy('oima_new.id','oima_new.image','oima_new.date', 'oima_new_translation.title')
    ->get();

    $news = $noticiasUnsorted->sortBy('oima_new_translation.name');

    return view('noticias', compact('news'));
    }

    public function filterCoursesByName(Request $request)
    {
    $nombreCurso = $request->input('name');
    $idioma =  app()->getLocale();

    $coursesUnsorted = SimaMedia::select(
        'sima_media.id',
        'sima_media.image',
        'sima_media.date',
        'sima_media_translation.title',
      
    )
    ->leftJoin('sima_media_translation', function ($join) use ($idioma) {
        $join->on('sima_media.id', '=', 'sima_media_translation.sima_media_id')
             ->where('sima_media_translation.locale', '=', $idioma);
    })
    ->where('sima_media_translation.title', 'LIKE', '%' . $nombreCurso . '%')
    ->groupBy('sima_media.id','sima_media.image','sima_media.date', 'sima_media_translation.title')
    ->get();

    $simaMedias = $coursesUnsorted->sortBy('sima_media_translation.title');

    return view('sima-media', compact('simaMedias'));
    }
    
    

}
