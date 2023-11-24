<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Organization;
use App\Models\OrganizationDelegate;
use App\Models\OrganizationExternal;
use App\Models\OrganizationPrice;
use App\Models\History;
use App\Models\Country;

class OrgController extends Controller
{

    public function changeLanguage($locale)
    {
 
            // Establece el idioma
            app()->setLocale('es');

        // Redirige de vuelta a la página anterior o a la página de inicio
        return redirect()->back();
    }



}
