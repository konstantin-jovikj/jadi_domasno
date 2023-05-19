@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container border mt-5 bg-light">
        <div class="row mt-5">

            <div class="col-12 text-center">
                <h2 class="border-bottom pb-5" id="exampleModalLabel">{{ $userView->name . ' ' . $userView->surname }}</h2>
            </div>
        </div>

            <div class="row">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <img src="{{ $userView->profile_img_url }}" alt="img" class="rounded-circle"
                        style="width: 220px; height: 220px;">
                </div>
                <div class="col-md-8 border-left  px-3">

                    <h5 class="card-title">User Role <strong class="text-info">{{ $userView->role->role_name }}</strong>
                    </h5>
                    <p class="card-text">Email: <strong>{{ $userView->email }}</strong></p>
                    <p class="card-text">Phone: <strong>{{ $userView->phone }}</strong></p>
                    <p class="card-text">Address: <strong>{{ $userView->address }}</strong></p>
                    <p class="card-text">Municipality: <strong>{{ $userView->municipality->municipality }}</strong>
                    </p>
                    <p class="card-text">About: <strong>{{ $userView->about }}</strong></p>
                    <p class="card-text">Other Info: <strong>{{ $userView->other }}</strong></p>
                    <p class="card-text">Status: <strong>
                            @if ($userView->is_active == 1)
                                {{ 'Active User' }}
                            @else
                                {{ 'Deactivated User' }}
                            @endif
                        </strong></p>
                    @if ($userView->role_id == 2)
                        <p class="card-text">Rating: <strong>{{ $userView->cook->cook_avg_rating }}</strong></p>
                        <p class="card-text">Delivery:
                            <strong>{{ $userView->cook->delivery_instructions }}</strong>
                        </p>
                        <p class="card-text">Facebook: <strong>{{ $userView->cook->facebook }}</strong></p>
                        <p class="card-text">Instagram: <strong>{{ $userView->cook->instagram }}</strong></p>
                        <p class="card-text">Web: <strong>{{ $userView->cook->web }}</strong></p>
                    @endif
                    <hr>
                    <p class="card-text"><small class="text-muted">Profile created on:
                            <strong>{{ $userView->created_at }}</strong> </small></p>

                    <p class="card-text"><small class="text-muted">Last updated
                            <strong>{{ $userView->updated_at }}</strong> </small></p>

                </div>
            </div>
            <div class="row">

                <div class="col-12 d-flex justify-content-center align-items-center">
                    <a href="{{ route('dashboard') }}" class="btn btn-domasno w-25 rounded-pill my-3">Back</a>
                </div>
            </div>


    </div>
@endsection
