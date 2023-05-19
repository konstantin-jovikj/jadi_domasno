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
                                    <th scope="col">Name</th>
                                    <th scope="col">SurName</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" style="width: 28%">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (empty($archivedUsers))
                                    <tr>
                                        <td></td>
                                        <td>Нема архивирани корисници</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @else
                                    @foreach ($archivedUsers as $user)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->surname }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role->role_name }}</td>
                                            <td class="{{ $user->is_active ? 'text-success' : 'text-danger' }}">
                                                @if ($user->is_active)
                                                    {{ 'Active' }}
                                                @else
                                                    {{ 'Inactive' }}
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-around flex-wrap">

                                                <form action="{{ route('restore.user', $user->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm btn-success rounded-pill px-3">Restore</button>
                                                </form>



                                                        <button type="button"
                                                            class="btn btn-sm btn-danger rounded-pill px-3 btn-deleteuser"
                                                            data-id="{{ $user->id }}">Delete Permanetly</button>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
