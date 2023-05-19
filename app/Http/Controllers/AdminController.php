<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Role;
use App\Models\User;
use App\Models\Spicy;
use App\Models\Category;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\SpicinessRequest;
use App\Models\Cook;
use App\Models\Order;
use App\Models\Subscriber;

class AdminController extends Controller
{
    public function getUsers()
    {
        $users = User::with('role')->where('role_id', '<>', 1)->get();
        // dd($users);
        return view('bootstrap_views.dashboards.admin', compact('users'));
    }

    public function changeStatus($id)
    {

        $user = User::find($id);

        if ($user->is_active) {
            $user->is_active = 0;
        } else {
            $user->is_active = 1;
        }

        $user->save();
        return redirect()->route('dashboard');
    }

    public function destroy(User $user)
    {
        if ($user->delete()) {
            return ['success' => 'The user is successfuly deleted !!!'];
        } else {
            return ['error' => 'Somethign went wrong!!'];
        }
    }


    public function viewUser($user)
    {
        $userView = User::find($user);
        return view('bootstrap_views.profile.viewProfile', compact('userView'));
    }


    public function archivedUsers()
    {
        $archivedUsers = User::onlyTrashed()->get();
        return view('bootstrap_views.dashboards.archivedusers', compact('archivedUsers'));
    }


    public function restoreUser($id)
    {
        $archivedUsers = User::onlyTrashed()->findOrFail($id);
        // dd($archivedUsers);
        $archivedUsers->restore();
        return redirect()->route('dashboard')->with('success', 'User restored from archive succesfully!');

    }

    public function deleteUser( $id)
    {
        $userDelete = User::onlyTrashed()->findOrFail($id);
        // dd( $userDelete);
        if($userDelete->forceDelete()) {
            return ['success' => 'The User is permanently deleted from database!!!'];
        } else {
            return ['error' => 'Somethign went wrong!!'];
        }
    }



    public function listDishes()
    {
        $dishes = Dish::with('cook.user')->get();
        // dd($dishes);
        return view('bootstrap_views.dashboards.admindishes', compact('dishes'));

    }

    public function viewDish($id)
    {
        $dish = Dish::with('cook.user','spicyness')->find($id);
        // dd($dish);
        return view('bootstrap_views.dishes.viewdish', compact('dish'));
    }


    public function viewAllOrders()
    {
        $orders = Order::with('user', 'dishes.cook', 'status')->get();
        return view('bootstrap_views.orders.vieworders', compact('orders'));

    }

    public function viewOrderDetails($id)
    {
        $order = Order::with('dishes.cook.user', 'status')->find($id);
        $cartItems = $order->dishes->map(function($dish) {
            $dish->quantity = $dish->pivot->quantity;
            return $dish;
        });

        $firstDishCook = $order->dishes->first()->cook;
        // dd($order, $cartItems);
        return view('bootstrap_views.orders.viewdetails', compact('order', 'cartItems', 'firstDishCook'));
    }

    public function viewSuscribers()
    {
        $subscribers = Subscriber::withTrashed()->get();
        return view('bootstrap_views.dashboards.admin_subscribers', compact('subscribers'));
    }

    public function restoreSubscriber($id)
    {
        $trashedSubscribers = Subscriber::onlyTrashed()->findOrFail($id);
        $trashedSubscribers->restore();
        return redirect()->route('view.subscribers')->with('success', 'Subscriber is restored from the trash succesfully!');

    }

    public function trashSubscriber($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();
        return redirect()->route('view.subscribers')->with('success', 'Subscriber is trashed succesfully!');

    }

    public function destroySubscriber($id)
    {
        $subscriber = Subscriber::withTrashed()->findOrFail($id);
        $subscriber->forceDelete();
        return redirect()->route('view.subscribers')->with('success', 'Subscriber is permanently Deleted!');

    }

}
