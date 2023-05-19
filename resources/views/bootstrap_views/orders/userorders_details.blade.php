@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container border mt-5 bg-light">
        <div class="row mt-5">

            <div class="col-12 text-center">
                <h4 class="border-bottom pb-5" id="exampleModalLabel"> <span class="text-muted">Order made by: </span> {{ $order->user->name . ' ' .  $order->user->surname }}, on : {{$order->created_at}}</h4>
            </div>

            <div class="col-12 text-center">
                <h4 class="border-bottom pb-5" id="exampleModalLabel"><span class="text-muted">Cooked by:</span> {{ $firstDishCook->user->name . ' '. $firstDishCook->user->surname }}</h4>
            </div>
        </div>

            <div class="row">
                @php
                    $curency = 'ден';
                @endphp
                <div class="col-md-12 border-left  px-3">
                    <table class="table table-sm table-hover mt-5" id="adminTable">
                        <thead class="bg-dark-custom thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Dish Image</th>
                                <th scope="col">Dish Name</th>
                                <th scope="col">Dish Price</th>
                                <th scope="col">Dish Promo-Price</th>
                                <th scope="col">Promo Price valid until</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Dish Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $cartItem)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <div class="avatar">
                                            <img src="{{ $cartItem->dish_img }}" alt="">
                                        </div>
                                    </td>
                                    <td>{{ $cartItem->dish_name }}</td>
                                    <td>{{ $cartItem->price }} {{ $curency}}</td>
                                    <td>{{ $cartItem->promo_price }} {{ $curency}}</td>
                                    <td>{{ $cartItem->promo_price_date }} </td>
                                    <td>{{ $cartItem->pivot->quantity }}</td>
                                    <td>{{ $cartItem->pivot->dish_amount }} {{ $curency}}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="row mt-5">

                        <div class="col-12 text-center">
                            <h4 class="border-bottom pb-5" id="exampleModalLabel">Order total amount: {{ $order->total_order_amount}} {{ $curency}}</h4>
                            <h4 class="border-bottom pb-5" id="exampleModalLabel">Order status: {{ $order->status->status_type}}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-12 d-flex justify-content-center align-items-center">
                    <a href="{{ route('user.orders') }}" class="btn btn-domasno w-25 rounded-pill my-3">Back</a>
                </div>
            </div>


    </div>
@endsection
