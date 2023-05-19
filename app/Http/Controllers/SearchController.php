<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($search_data)
    {
        $searchResult = Dish::where('dish_name', 'like', '%' . $search_data . '%')->get();


        if (count($searchResult)) {
            return response()->json($searchResult, 200, ['Content-Type' => 'application/json']);
        } else {
            return response()->json(['Result' => 'No Data not found'], 404);
        }
    }
}
