<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteText;
use App\Models\Extra;
use App\Models\InfoCountry;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreo;

class ContactController extends Controller
{
    public function Contact(Request $request){
        
        $countries = InfoCountry::all();
        $extras = Extra::first();
        $contact = $this->getSiteText();

        return view('contacto', compact('countries','contact','extras'));
    }

    public function getSiteText()
    {
        $site = SiteText::first();

    if ($site) {
        return $site;
    }

    return null; 
    }

    public function enviarCorreo(Request $request)
    {

        $data = [
            'name' => $request->input('name'),
            'country' => $request->input('country'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];


        Mail::to('')->send(new EnviarCorreo($data));



        return redirect()->back()->with('success', 'Correo enviado correctamente');
    }

   
}
