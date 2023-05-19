<?php

namespace App\Http\Controllers;

use App\Models\Spicy;
use Illuminate\Http\Request;
use App\Http\Requests\SpicinessRequest;

class SpicinessController extends Controller
{
    public function viewSpicines()
    {
        $spicines = Spicy::all();
        return view('bootstrap_views.dashboards.adminspicines', compact('spicines'));
    }

    public function addSpiciness()
    {
        return view('bootstrap_views.dashboards.addspiciness');
    }

    public function storeSpiciness(SpicinessRequest $request)
    {
        $spiciness = new Spicy();
        $spiciness->spicylevel = $request->spicines_name;

        $spiciness->save();
        return redirect()->route('view.spicy')->with('success', 'New Spiciness Level Sucessfully added to the list!');
    }

    public function editSpiciness($spiciness)
    {
        $editedSpiciness = Spicy::find($spiciness);
        return view('bootstrap_views.dashboards.editspiciness', compact('editedSpiciness'));
    }

    public function updateSpiciness(SpicinessRequest $request, $spiciness)
    {
        $spiciness = Spicy::find($spiciness);
        $spiciness->spicylevel = $request->spicines_name;

        $spiciness->save();
        return redirect()->route('view.spicy')->with('success', 'The Spiciness Level is Sucessfully updated!');
    }

    public function destroySpiciness(Spicy $spiciness)
    {
        if ($spiciness->delete()) {
            return ['success' => 'The spiciness level is successfuly deleted !!!'];
        } else {
            return ['error' => 'Somethign went wrong!!'];
        }
    }
}
