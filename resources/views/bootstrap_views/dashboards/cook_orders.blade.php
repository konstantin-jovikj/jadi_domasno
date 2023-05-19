@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row vh-100">
            @include('bootstrap_views.partials.cook_sidenav')

            <div class="col-lg-10 col-sm-12 display-data">
                @include('bootstrap_views.partials.system_message')

                <div class="row">
                    <div class="col-12 mt-5">
                        <table class="table table-sm table-hover mt-5" id="cookTable">
                            <thead class="bg-dark-custom thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Order Status</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col" >Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{ $order->status->status_type }}</td>
                                        <td>{{ $order->created_at}}</td>


                                        <td class="d-flex flex-wrap">

                                            <a type="button" href="{{ route('get.status', $order->id) }}" class="btn btn-sm btn-info rounded-pill px-3 mr-3" ">Change Status</a>

                                            <a type="button" href="{{ route('cook_order.details', $order->id) }}" class="btn btn-sm btn-success rounded-pill px-3" ">View Order Details</a>

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
