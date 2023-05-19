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
                                    <th scope="col">Dish Image</th>
                                    <th scope="col">Dish Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Cook Name</th>
                                    <th scope="col">Cook Surname</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" style="width: 28%">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dishes as $dish)
                                    <tr class="{{ $dish->cook->user->is_active ? 'table-success' : 'table-danger' }}">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <div class="avatar">
                                                <img src="{{ $dish->dish_img }}" alt="">
                                            </div>
                                        <td>{{ $dish->dish_name }}</td>
                                        <td>{{ $dish->cook->user->email }}</td>
                                        <td>{{ $dish->cook->user->name }}</td>
                                        <td>{{ $dish->cook->user->surname }}</td>
                                        <td>
                                            @if ($dish->cook->user->is_active)
                                                Active User
                                            @else
                                                Inactive User
                                            @endif
                                        </td>

                                        <td class="">

                                            <a class="btn btn-sm btn-success rounded-pill px-3" href="{{ route('view.dishdetails', $dish->id) }}">View</a>

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
