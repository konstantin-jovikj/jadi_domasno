@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row vh-100">
            @include('bootstrap_views.partials.sidenav')
            <div class="col-lg-10 col-sm-12 display-data mt-5">
                <div class="row mt-5">
                    <div class="col-md-4 offset-md-4 col-12 ">
                        <form class="border bg-light shadow p-5 rounded-custom" action="{{route('store.status')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="status">Status Level:</label>
                                <input type="text" class="form-control rounded-custom" id="status" name="status">
                                @error('status')
                                    <small id="status-message" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group text-center mb-0 mt-4">
                                <button type="submit" class="btn btn-domasno w-50 rounded-pill mb-0 ">Add New Status Level</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
