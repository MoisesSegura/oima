<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteText;
use App\Models\InfoCountry;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreo;

class ContactController extends Controller
{
    public function Contact(Request $request){
        
        $countries = InfoCountry::all();

        $contact = $this->getSiteText();

        return view('contacto', compact('countries','contact'));
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
 
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'country' => 'required|string',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // Enviar el correo
        Mail::to($request->input('email'))->send(new EnviarCorreo($request));

       
        return redirect()->back()->with('success', 'Correo enviado con éxito');
    }

   
}
