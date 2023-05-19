@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row vh-100">
        @include('bootstrap_views.partials.sidenav')
            <div class="col-lg-10 col-sm-12 display-data mt-5">
                @include('bootstrap_views.partials.system_message')
                <div class="row d-flex justify-content-center my-5">
                    <a class="btn btn-domasno w-20 rounded-pill" href="{{ route('add.municipality') }}">
                        Add New Municipality
                    </a>
                </div>
                <div class="row mt-5">
                    <div class="col-12">
                        <table class="table table-sm table-hover mt-5" id="adminTable">
                            <thead class="bg-dark-custom thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Municipality Name</th>
                                    <th scope="col" style="width: 28%">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($municipalities as $municipality)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $municipality->municipality }}</td>
                                        <td class="d-flex justify-content-around flex-wrap">


                                            <a class="btn btn-sm btn-warning rounded-pill px-3"
                                                href="{{ route('edit.municipality',$municipality->id) }}">Edit</a>

                                            <button type="submit"
                                                class="btn btn-sm btn-danger rounded-pill px-3 btn-delete-municipality"
                                                data-id="{{ $municipality->id }}">Delete</button>
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
