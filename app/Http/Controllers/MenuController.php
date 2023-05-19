<?php

namespace App\Http\Controllers;

use App\Models\Cook;
use App\Models\Dish;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function indexCooks()
    {
        $cooks = Cook::with(['dishes.orders', 'dishes.availability', 'dishes.categories', 'dishes.alergens', 'user', 'dishes.comments' => function($query){
            $query->select('dish_id', 'rate_level', 'comment');
        }])->get();
        // return view('bootstrap_views.tempviews.cooks', compact('cooks'));
        return response()->json($cooks, 200, ['Content-Type' => 'application/json']);
    }


    public function indexDishes()
    {
        $dishes = Dish::with(['categories', 'alergens', 'availability', 'cook.user', 'orders', 'comments'])->get();
        // return view('bootstrap_views.tempviews.dishes', compact('dishes'));
        return response()->json($dishes, 200, ['Content-Type' => 'application/json']);
    }

}
