<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\WorkPrinciple;
use App\Models\History;
use App\Models\Person;
use App\Models\Oima;
use App\Models\ExecutiveCommitee;
use App\Models\Achievement;
use App\Models\Organization;
use App\Models\OrganizationDelegate;
use App\Models\OrganizationExternal;
use App\Models\OrganizationPrice;
use App\Models\Country;


class oimaController extends Controller
{
    
    public function oima(Request $request){

        
        $workprinciple = WorkPrinciple::all();

        $history = History::all();

        $person = Person::all();

        $oima = Oima::all();

        $executivecommitee = ExecutiveCommitee::all();

        $achievement = Achievement::all();

        $countries = Country::with('region', 'organizations')->orderBy('name')->get();


        return view('oima', compact('workprinciple','history','person','oima','executivecommitee','achievement','countries'));
    }

    public function showOrganization($id)
    {
        $organization = Organization::findOrFail($id);

        $delegates = OrganizationDelegate::where('organization_id', $organization->id)->get();

        $links = OrganizationExternal::where('organization_id', $organization->id)->get();

        $prices = OrganizationPrice::where('organization_id', $organization->id)->get();

        return view('verOrganizacion', compact('organization','delegates','links','prices'));
    }

    public function history()
    {
        $history = History::first();

    
        return view('historia', compact('history'));
    }


    
    }