<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use Illuminate\Http\Request;
use App\Http\Requests\MunicipalityRequest;

class MunicipalityController extends Controller
{
    public function viewMunicipalities()
    {
        $municipalities = Municipality::all();
        return view('bootstrap_views.dashboards.adminmunicipality', compact('municipalities'));
    }

    public function addMunicipalityForm()
    {
        return view('bootstrap_views.dashboards.addmunicipality');
    }

    public function storeMunicipality(MunicipalityRequest $request)
    {
        $municipality = new Municipality();
        $municipality->municipality = $request->municipality_name;

        $municipality->save();
        return redirect()->route('view.municipalities')->with('success', 'New Municipality Sucessfully added to the list!');
    }

    public function editMunicipality($municipality)
    {
        $editedMunicipality = Municipality::find($municipality);
        return view('bootstrap_views.dashboards.editmunicipalities', compact('editedMunicipality'));
    }

    public function updateMunicipality(MunicipalityRequest $request, $municipality)
    {
        $municipality = Municipality::find($municipality);
        $municipality->municipality = $request->municipality_name;

        $municipality->save();
        return redirect()->route('view.municipalities')->with('success', 'The Municipality is Sucessfully updated!');
    }

    public function destroyMunicipality(Municipality $municipality)
    {
        if ($municipality->delete()) {
            return ['success' => 'The municipality is successfuly deleted !!!'];
        } else {
            return ['error' => 'Somethign went wrong!!'];
        }
    }
}
