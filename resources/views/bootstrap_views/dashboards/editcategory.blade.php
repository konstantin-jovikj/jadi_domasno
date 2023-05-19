@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row vh-100">
            @include('bootstrap_views.partials.sidenav')
            <div class="col-lg-10 col-sm-12 display-data mt-5">
                <div class="row mt-5">
                    <div class="col-md-4 offset-md-4 col-12 ">
                        <form class="border bg-light shadow p-5 rounded-custom" action="{{route('update.category',$editedCategory->id )}}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="category_name">Category Name:</label>
                                <input type="text" class="form-control rounded-custom" id="category_name" name="category_name" value="{{$editedCategory->category_name}}">
                                @error('category_name')
                                    <small id="category_name-message" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group text-center mb-0 mt-4">
                                <button type="submit" class="btn btn-domasno w-50 rounded-pill mb-0 ">Update Category</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
