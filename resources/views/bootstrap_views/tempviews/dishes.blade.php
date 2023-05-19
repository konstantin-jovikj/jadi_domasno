@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container mt-5">

        @include('bootstrap_views.partials.system_message')
        <div class="row">
            @foreach ($dishes as $dish)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ $dish->dish_img }}" class="card-img-top" alt="{{ $dish->dish_name }}">

                        <div class="card-body">
                            <h5 class="card-title">{{ $dish->dish_name }}</h5>
                            <p class="card-text">{{ $dish->description }}</p>
                            <p class="card-text">Price: {{ $dish->price }}</p>

                            <p class="card-text">Categories:
                                @foreach ($dish->categories as $category)
                                    {{ $category->category_name }},
                                @endforeach
                            </p>

                            <p class="card-text">Allergens:
                                @foreach ($dish->alergens as $allergen)
                                    {{ $allergen->alergen_name }},
                                @endforeach
                            </p>

                            <p class="card-text">Cook: {{ $dish->cook->user->name . ' ' . $dish->cook->user->surname }}</p>
                            <p class="card-text">Orders Count: {{ $dish->orders->count() }}</p>
                            <p class="card-text">Comments Count: {{ $dish->comments->count() }}</p>

                            <p class="card-text">Comments:
                                @foreach ($dish->comments as $comment)
                                    {{ $comment->pivot->comment }}
                                @endforeach
                            </p>
                            <form action="{{ route('add.cart', $dish->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
