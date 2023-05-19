@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-lg-10 col-sm-12 display-data mt-5">
                <div class="row mt-5">
                    <div class="col-12">
                        @foreach($cooks as $cook)
                        @foreach($cook->dishes as $dish)
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <img src="{{ $dish->dish_img }}" class="card-img-top" alt="{{ $dish->dish_name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $dish->dish_name }}</h5>
                                        <p class="card-text">{{ $dish->description }}</p>
                                        <p class="card-text">{{ $cook->user->about }}</p>
                                        <p class="card-text"><small class="text-muted">Cook: {{ $cook->user->name }}</small></p>
                                        <a href="#" class="btn btn-primary">Order Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach


                        @foreach($users as $user)

                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <img src="{{ $user->profile_img_url }}" class="card-img-top" alt="{{ $user->name . ' '. $user->surname }}">
                                    <div class="card-body">
                                        <p class="card-text">{{ $user->email  }}</p>
                                    </div>
                                </div>
                            </div>

                    @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
