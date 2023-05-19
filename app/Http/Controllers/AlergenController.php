<?php

namespace App\Http\Controllers;

use App\Models\Alergen;
use Illuminate\Http\Request;
use App\Http\Requests\AlergenRequest;

class AlergenController extends Controller
{

    public function viewAlergens()
    {
        $alergens = Alergen::all();
        return view('bootstrap_views.dashboards.adminalergens', compact('alergens'));
    }

    public function addAlergenForm()
    {
        return view('bootstrap_views.dashboards.addalergen');
    }

    public function storeAlergen(AlergenRequest $request)
    {
        $alergen = new Alergen();
        $alergen->alergen_name = $request->alergen_name;

        $alergen->save();
        return redirect()->route('view.alergens')->with('success', 'New Alergen Sucessfully added to the list!');
    }

    public function editAlergen($alergen)
    {
        $editedAlergen = Alergen::find($alergen);
        return view('bootstrap_views.dashboards.editalergen', compact('editedAlergen'));

    }

    public function updateAlergen(AlergenRequest $request, $alergen)
    {
        $alergen = Alergen::find($alergen);
        $alergen->alergen_name = $request->alergen_name;

        $alergen->save();
        return redirect()->route('view.alergens')->with('success', 'Alergen Sucessfully updated!');
    }

    public function destroyAlergen(Alergen $alergen)
    {
        if($alergen->delete()) {
            return ['success' => 'The dish is successfuly deleted !!!'];
        } else {
            return ['error' => 'Somethign went wrong!!'];
        }
    }
}
