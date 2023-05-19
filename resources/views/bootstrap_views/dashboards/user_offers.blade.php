@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row vh-100">
            @include('bootstrap_views.partials.user_sidenav')

            <div class="col-lg-10 col-sm-12 display-data">
                @include('bootstrap_views.partials.system_message')
                <div class="row d-flex justify-content-center my-5">
                    <a class="btn btn-domasno w-20 rounded-pill" href="{{ route('create.offer') }}">
                        Ask for a new Offer
                    </a>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-sm table-hover mt-5" id="cookTable">
                            <thead class="bg-dark-custom thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Offer Title</th>
                                    <th scope="col">Recepient</th>
                                    <th scope="col">Offer Date</th>
                                    <th scope="col" >Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offers as $offer)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{ $offer->title }}</td>
                                        <td>{{ $offer->cook->user->name . ' ' . $offer->cook->user->surname }}</td>
                                        <td>{{ $offer->created_at }}</td>

                                        <td class="d-flex justify-content-around flex-wrap">

                                                <button type="button" class="btn btn-sm btn-danger rounded-pill px-3 btn-delete-offer" data-id="{{ $offer->id }}">Delete</button>
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
