<?php

namespace App\Http\Controllers;

use App\Models\Cook;
use App\Models\Dish;
use App\Models\User;
use App\Models\Order;
use App\Models\Spicy;
use App\Models\Alergen;
use App\Models\Category;
use App\Models\Subscriber;
use App\Models\Availability;
use Illuminate\Http\Request;
use App\Http\Requests\DishRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AvailabilityRequest;
use App\Mail\SubscribersNewMealNotification;

class CookController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $cook = User::find($userId)->cook->id;
        $dishes = Cook::find($cook)->dishes()->get();


        return view('bootstrap_views.dashboards.cook', compact('cook', 'dishes'));
    }

    public function newDishCreate()
    {
        $spiciness = Spicy::all();
        $alergens = Alergen::all();
        $categories = Category::all();
        return view('bootstrap_views.newdish', compact('spiciness', 'alergens', 'categories'));
    }

    public function store(DishRequest $request)
    {
        $dish = new Dish();
        $userId = Auth::user()->id;
        $cook = Cook::where('user_id', $userId)->first();
        $cookId = $cook->id;

        $dish->cook_id = $cookId;
        $dish->spiciness_id = $request->spiciness;
        $dish->dish_name = $request->dishname;
        $dish->dish_img = $request->dish_image;
        $dish->hashtag = $request->hashtag;
        $dish->ingredients = $request->ingredients;
        $dish->description = $request->description;
        $dish->prep_time = $request->prep_time;
        $dish->heating_instructions = $request->heating_instructions;
        $dish->portion_size = $request->portion_size;
        $dish->price = $request->price;
        $dish->promo_price = $request->promo_price;
        $dish->promo_price_date = $request->promo_price_date;

        // dd($cook, $dish);

        $dish->save();
        $dishAlergens = $request->alergens;
        $dishCategories = $request->category;
        $dish->alergens()->sync($dishAlergens, false);
        $dish->categories()->sync($dishCategories, false);

        //send mail to subscribers

        $subscribers = Subscriber::all();


        foreach( $subscribers as $subscriber)
            {
                $data = [
                    'dishId' => $dish->id,
                    'subscriber' => $subscriber->id,
                    'title' => 'Додадено е ново јадење во нашето мени'
                ];

                Mail::to($subscriber->email)->send(new SubscribersNewMealNotification($data));
            }

        return redirect()->route('create.dates', compact('dish'));
    }

    public function createAvailableDates($dish)
    {

        $curentDish = Dish::find($dish);
        $dishId = $curentDish->id;
        // dd( $dishId);
        $availableDates = Availability::where('dish_id', $dishId)->get();
        return view('bootstrap_views.dishes.availability', compact('curentDish', 'availableDates'));
    }

    public function storeDishDates(AvailabilityRequest $request, $curentDish)
    {
        $available = new Availability();

        $available->dish_id = $curentDish;
        $dish = $curentDish;
        $available->available_date = $request->available_date;
        $available->is_available = 1;
        $available->portions_nr = $request->portions_number;

        // dd($available);

        $available->save();



        return redirect()->route('create.dates', compact('dish'));
    }



    public function destroyDate(Availability $date)
    {

        $id = $date->id;
        if ($date->delete()) {
            return redirect()->back()->with('success', 'Date Deleted')->with('id', $id);
        } else {
            return redirect()->back()->with('error', 'An error occured');
        }
    }


    public function editDish($dish)
    {
        $spiciness = Spicy::all();
        $alergens = Alergen::all();
        $categories = Category::all();
        $dish = Dish::with('alergens:id,alergen_name', 'categories')->find($dish);
        $dishAlergens = $dish->alergens;
        $dishCategories = $dish->categories;
        // dd($dishCategories);
        return view('bootstrap_views.dishes.editdish', compact('spiciness', 'alergens', 'categories', 'dish', 'dishAlergens', 'dishCategories'));
    }

    public function updateDish(DishRequest $request, $dish)
    {
        $dish = Dish::find($dish);
        $userId = Auth::user()->id;
        $cook = Cook::where('user_id', $userId)->first();
        $cookId = $cook->id;

        $dish->cook_id = $cookId;
        $dish->spiciness_id = $request->spiciness;
        $dish->dish_name = $request->dishname;
        $dish->dish_img = $request->dish_image;
        $dish->hashtag = $request->hashtag;
        $dish->ingredients = $request->ingredients;
        $dish->description = $request->description;
        $dish->prep_time = $request->prep_time;
        $dish->heating_instructions = $request->heating_instructions;
        $dish->portion_size = $request->portion_size;
        $dish->price = $request->price;
        $dish->promo_price = $request->promo_price;
        $dish->promo_price_date = $request->promo_price_date;

        // dd($cook, $dish);

        $dish->save();
        $dishAlergens = $request->alergens;
        $dishCategories = $request->category;
        $dish->alergens()->sync($dishAlergens);
        $dish->categories()->sync($dishCategories);

        return redirect()->route('list.dishes')->with('success', 'Dish successfuly updated');
    }

    public function destroyDish(Dish $dish)
    {
        if ($dish->delete()) {
            return ['success' => 'The dish is successfuly deleted !!!'];
        } else {
            return ['error' => 'Somethign went wrong!!'];
        }
    }

    public function receivedOrders()
    {

        $cookId = auth()->user()->cook->id;
        $orders = Order::with('status')->where('cook_id',  $cookId)->get();

        // dd($orders);
        return view('bootstrap_views.dashboards.cook_orders', compact('orders'));
    }

    public function cookOrderDetails($id)
    {
        $order = Order::with('dishes.cook.user', 'status')->find($id);
        $cartItems = $order->dishes->map(function($dish) {
            $dish->quantity = $dish->pivot->quantity;
            return $dish;
        });
        $firstDishCook = $order->dishes->first()->cook;
        // dd($order, $cartItems);
        return view('bootstrap_views.orders.cook_order_details', compact('order', 'cartItems', 'firstDishCook'));
    }
}
