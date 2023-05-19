@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row vh-100">
            @include('bootstrap_views.partials.cook_sidenav')

            <div class="col-lg-10 col-sm-12 display-data">
                @include('bootstrap_views.partials.system_message')
                <div class="row d-flex justify-content-center my-5">
                    <a class="btn btn-domasno w-20 rounded-pill" href="{{ route('create.dish') }}">
                        Add New Dish
                    </a>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-sm table-hover mt-5" id="cookTable">
                            <thead class="bg-dark-custom thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Dish Image</th>
                                    <th scope="col">Dish Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Promo Price</th>
                                    <th scope="col">Promo Date End</th>
                                    <th scope="col" >Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dishes as $dish)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>
                                            <div class="avatar">
                                                <img src="{{ $dish->dish_img }}" alt="">
                                            </div>
                                        </td>
                                        <td>{{ $dish->dish_name }}</td>
                                        <td>{{ $dish->price }} ден.</td>
                                        <td>{{ $dish->promo_price }} ден.</td>
                                        <td>{{ $dish->promo_price_date }}</td>

                                        <td class="d-flex justify-content-around flex-wrap">

                                            {{-- <a class="btn btn-sm btn-info rounded-pill px-3"
                                                href="{{ route('change.status', $dish->id) }}">{{ $user->is_active ? 'Deactivate' : 'Activate' }}</a> --}}

                                            <a class="btn btn-sm btn-warning rounded-pill px-3" href="{{ route('edit.dish', $dish->id) }}">Edit Dish</a>
                                            <a class="btn btn-sm btn-domasno rounded-pill px-3" href="{{ route('create.dates', $dish->id) }}">Edit available dates</a>

                                                <button type="button" class="btn btn-sm btn-danger rounded-pill px-3 btn-delete-dish" data-id="{{ $dish->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
