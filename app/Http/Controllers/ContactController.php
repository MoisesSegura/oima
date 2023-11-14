<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteText;
use App\Models\InfoCountry;
use Illuminate\Support\Facades\Mail;

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

    public function enviarMensaje(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
            'recaptcha_response' => 'required|recaptcha',
        ]);

        // Ejemplo de envío de correo (requiere configuración de correo en .env)
        Mail::to('destinatario@example.com')->send(new \App\Mail\MensajeEnviado($request->all()));

        // Puedes redirigir a una página de éxito o mostrar un mensaje, según tus necesidades
        return redirect()->route('pagina-de-exito')->with('success', 'Mensaje enviado correctamente');

        // modificar en el .env:
            // MAIL_MAILER=smtp
            // MAIL_HOST=your_smtp_host
            // MAIL_PORT=your_smtp_port
            // MAIL_USERNAME=your_smtp_username
            // MAIL_PASSWORD=your_smtp_password
            // MAIL_ENCRYPTION=tls

    }

   
}
