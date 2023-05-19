<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CartOrderRequest;


class CartController extends Controller
{
    public function addToCart($dishid)
    {

        // dd($dishid);
        $cartSession = session()->get('cart', []);
        $dish = Dish::find($dishid);
        $cookId = $dish->cook->id;

        if (empty($cartSession)) {
            session()->put('cook_id', $cookId);
        } else {
            $sessionCookId = session()->get('cook_id');
            if ($cookId != $sessionCookId) {
                return response()->json(['message' => 'You can only add dishes from the same cook'], 400);
            }
        }
        if(!in_array($dishid,$cartSession)){
            $cartSession[] = $dishid;
            session()->put('cart', $cartSession);
        }
        // return response()->json(['message' => 'Dish added to cart successfully'], 200);
        return redirect()->route('list.dishes')->with('message', 'Dish added to cart successfully');
    }


    public function viewCart(CartOrderRequest $request)
    {
        $cartItems = session()->get('cart');
        $totalAmount = 0;
        $dishes = [];
        foreach($cartItems as $cartItem)
        {
            $dish = Dish::find($cartItem);
            $quantity = $request->quantity;
            $maxQuantity = $dish->availability->portions_nr->where('available_date', today());

            if($quantity > $maxQuantity){
                return response()->json(['message' => 'The Maximum available portions of this dish for today is: ' . $maxQuantity, 400]);
            }

            if ($dish->promo_price && strtotime($dish->promo_price_date) >= strtotime('today')) {
                $dishAmount = $quantity * $dish->promo_price;
            } else {
                $dishAmount = $quantity * $dish->price;
                $price = $dish->price;
            }

            $totalAmount += $dishAmount;

            $dishes[] = [
                'dish' => $dish,
                'quantity' => $quantity,
                'price' => $price,
                'amount' => $dishAmount
            ];
        }

        return [
            'dishes' => $dishes,
            'totalAmount' => $totalAmount
        ];

    }




    public function makeOrder(CartOrderRequest $request)
    {
        $cartItems = session()->get('cart');
        $userId = auth()->user->id;

        if (empty($cartItems) || empty($userId)) {
            return response()->json(['message' => 'Cart is empty or user is not authenticated'], 400);
        }
        $order = new Order();
        $order->user_id = $userId;

        $order->save();
        $totalAmount = 0;
        foreach($cartItems as $cartItem)
        {
            $dish = Dish::find($cartItem);
            $quantity = $request->quantity;

            if ($dish->promo_price && strtotime($dish->promo_price_date) >= strtotime('today')) {
                $dishAmount = $quantity * $dish->promo_price;
            } else {
                $dishAmount = $quantity * $dish->price;
            }

            $order->dishes()->attach($cartItem, [
                'order_id' => $order->id,
                'quantity' => $quantity,
                'dish_amount' => $dishAmount,
            ]);
            $totalAmount += $dishAmount;
            $maxQuantity = $dish->availability->portions_nr->where('available_date', today())->first();
            if($maxQuantity){
                $newQuantity = $maxQuantity->portions_nr - $quantity;
                $maxQuantity->update(['portions_nr' => $newQuantity]);
            }
        }
        $order->cook_id = $dish->cook->id;
        $order->total_amount = $totalAmount;
        $order->save();

        session()->forget('cart');

        return response()->json(['message' => 'Order created successfully'], 200);

    }

}
