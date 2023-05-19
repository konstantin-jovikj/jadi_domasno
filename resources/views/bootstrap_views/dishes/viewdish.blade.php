@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container border mt-5 bg-light">
        <div class="row mt-5">

            <div class="col-12 text-center">
                <h2 class="border-bottom pb-5" id="exampleModalLabel">{{ $dish->dish_name}}</h2>
            </div>
        </div>

            <div class="row">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <img src="{{ $dish->dish_img }}" alt="img" class="rounded-circle"
                        style="width: 220px; height: 220px;">
                </div>
                <div class="col-md-8 border-left  px-3">

                    <h5 class="card-title">Cook:  <strong class="text-info">{{ $dish->cook->user->name . ' ' . $dish->cook->user->surname }}</strong>
                    </h5>
                    <p class="card-text">Ingredients: <strong>{{ $dish->ingredients }}</strong></p>
                    <p class="card-text">Description: <strong>{{ $dish->description }}</strong></p>
                    <p class="card-text">Preparation Time: <strong>{{ $dish->prep_time }}</strong></p>
                    <p class="card-text">Heating Instructions: <strong>{{ $dish->heating_instructions }}</strong>
                    </p>
                    <p class="card-text">Portion Size: <strong>{{ $dish->portion_size }}</strong></p>
                    <p class="card-text">Price: <strong>{{ $dish->price }}</strong></p>
                    <p class="card-text">Promotional Price: <strong>{{ $dish->promo_price  }}</strong></p>
                    <p class="card-text">Promotional price valid until: <strong>{{ $dish->promo_price_date }}</strong></p>

                    <hr>
                    <p class="card-text"><small class="text-muted">Dish added on:
                            <strong>{{ $dish->created_at }}</strong> </small></p>

                    <p class="card-text"><small class="text-muted">Last updated on:
                            <strong>{{ $dish->updated_at }}</strong> </small></p>

                </div>
            </div>
            <div class="row">

                <div class="col-12 d-flex justify-content-center align-items-center">
                    <a href="{{ route('view.dishes') }}" class="btn btn-domasno w-25 rounded-pill my-3">Back</a>
                </div>
            </div>


    </div>
@endsection
