<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteText;
use App\Models\Extra;
use App\Models\InfoCountry;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnviarCorreo;
use App\Mail\ContactMail;
use ReCaptcha\ReCaptcha;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function Contact(Request $request)
    {

        $countries = InfoCountry::all();
        $extras = Extra::first();
        $contact = $this->getSiteText();

        return view('contacto', compact('countries', 'contact', 'extras'));
    }

    public function getSiteText()
    {
        $site = SiteText::first();

        if ($site) {
            return $site;
        }

        return null;
    }

    public function sendEmail(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'country' => 'required',
            'message' => 'required',
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('RECAPTCHA_SECRET_KEY'),
            'response' => $request->input('g-recaptcha-response')
        ])->object();


        if ($response->success && $response->score >= 0.7) {
            
            Mail::to('oima@iica.int')->send(new ContactMail($validatedData));

            return redirect()->back()->with('success', 'El correo ha sido enviado correctamente.');

        } else {
            return redirect()->back()->withErrors(['captcha' => 'El captcha no es válido.']);
        }


       
    }



}
