@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-lg-10 col-sm-12 display-data mt-5">
                @include('bootstrap_views.partials.system_message')
                <div class="row mt-5">
                    <div class="col-md-4 offset-md-4 col-12 ">
                        <form class="border bg-light shadow p-5 rounded-custom" action="{{route('store.subscriber')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="subscribe_email">Enter your Email address:</label>
                                <input type="email" class="form-control rounded-custom" id="email" name="email">
                                {{-- @error('email')
                                    <small id="subscribe_email-message" class="form-text text-danger">{{ $message }}</small>
                                @enderror --}}
                            </div>
                            <div class="form-group text-center mb-0 mt-4">
                                <button type="submit" class="btn btn-domasno w-50 rounded-pill mb-0 ">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
