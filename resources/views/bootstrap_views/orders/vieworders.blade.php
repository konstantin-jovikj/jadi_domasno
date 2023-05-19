@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row vh-100">
            @include('bootstrap_views.partials.sidenav')
            <div class="col-lg-10 col-sm-12 display-data mt-5">
                @include('bootstrap_views.partials.system_message')
                <div class="row mt-5">
                    <div class="col-12">
                        <table class="table table-sm table-hover mt-5" id="adminTable">
                            <thead class="bg-dark-custom thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User Name</th>
                                    <th scope="col">User SurName</th>
                                    <th scope="col">Order Status</th>
                                    <th scope="col">Order Amount</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col" style="width: 28%">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->user->surname }}</td>
                                        <td>{{ $order->status->status_type }}</td>
                                        <td>{{ $order->total_order_amount }}</td>
                                        <td>{{ $order->created_at }}</td>

                                        <td class="d-flex justify-content-around flex-wrap">

                                            <a class="btn btn-sm btn-success rounded-pill px-3"
                                                href="{{ route('order.details', $order->id) }}">View</a>

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
