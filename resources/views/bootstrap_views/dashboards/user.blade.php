@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row vh-100">
            @include('bootstrap_views.partials.user_sidenav')

            <div class="col-lg-10 col-sm-12 display-data">
                @include('bootstrap_views.partials.system_message')

                <div class="row">
                    <div class="col-12 text-center mt-5">
                        <h4>Добредојде</h4>
                        <p class="display-4">{{ Auth::user()->name . ' ' . Auth::user()->surname }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
