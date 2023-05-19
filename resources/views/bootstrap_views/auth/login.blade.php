@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container">
        @include('bootstrap_views.partials.system_message')
        <div class="row">
            <div class="col-8 offset-2 mt-5">
                <form class="p-5 border shaddow" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control rounded-custom" id="email" name="email" value="{{old('email')}}" placeholder="admin@admin.com">
                        @error('email')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control rounded-custom" id="password" name="password">
                    @error('password')
                        <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="form-group d-flex justify-content-center mt-5">

                        <button type="submit" class="btn btn-domasno w-50 rounded-pill">Login</button>

                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
