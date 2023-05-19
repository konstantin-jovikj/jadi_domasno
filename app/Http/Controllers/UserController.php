<?php

namespace App\Http\Controllers;

use App\Models\Cook;
use App\Models\Dish;
use App\Models\User;
use App\Models\Order;
use App\Events\VerifyEmail;
use Illuminate\Http\Request;
use App\Events\ActivateUserEvent;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentAndRatingRequest;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class UserController extends Controller
{
    public function index()
    {
        $cooks = Cook::with(['dishes', 'dishes.availability', 'dishes.categories', 'dishes.orders', 'dishes.alergens', 'dishes.comments' => function ($query) {
            $query->select('dish_id', 'rate_level', 'comment');
        }])->get();
        $users = User::with('orders')->where('role_id', 3)->get();

        $data = [
            'cooks' => $cooks,
            'users' => $users,
        ];
        return response()->json($data, 200, ['Content-Type' => 'application/json']);
    }


    public function AddCommentsAndRatings(CommentAndRatingRequest $request, $id)
    {
        $dish = Dish::find($id);
        $user = auth()->user();

        $dishComment = $request->comment;
        $dishRating = $request->rate_level;

        $dish->comments()->attach($user->id, [
            'comment' => $dishComment,
            'rate_level' => $dishRating,
            'dish_id' => $dish->id
        ]);

        return response()->json(200, ['message' => 'Thank you for your Feedback']);
    }



    public function activateUser($email, $code)
    {
        $user = User::where('email', $email)->where('activation_code', $code)->first();

        if (!$user) {
            throw new UnauthorizedHttpException('Unauthorized', new \Exception('Invalid activation link.'));
        }

        if ($user->isActivationLinkExpired()) {
            return view('bootstrap_views.emails.expired')->with('email', $email);
        }

        $user->activate();
        event(new ActivateUserEvent($user)); //////////////

        return redirect('login');
    }



    public function userDashboard()
    {
        return view('bootstrap_views.dashboards.user');
    }


    public function viewOrders()
    {
        $userId = Auth::user()->id;
        $orders = Order::with('status')->where('user_id',  $userId)->get();

        return view('bootstrap_views.dashboards.user_orders', compact('orders'));
    }

    public function orderDetails($id)
    {
        $order = Order::with('dishes.cook.user', 'status')->find($id);
        $cartItems = $order->dishes->map(function($dish) {
            $dish->quantity = $dish->pivot->quantity;
            return $dish;
        });
        $firstDishCook = $order->dishes->first()->cook;
        // dd($order, $cartItems);
        return view('bootstrap_views.orders.userorders_details', compact('order', 'cartItems', 'firstDishCook'));
    }
}
