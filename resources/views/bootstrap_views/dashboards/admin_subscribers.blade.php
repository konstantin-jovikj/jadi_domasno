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
                                    <th scope="col">E-mail address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" style="width: 28%">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribers as $subscriber)
                                    <tr class="
                                    @if ($subscriber->trashed())
                                        {{'table-danger'}}
                                    @else
                                        {{'table-success'}}
                                    @endif
                                ">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $subscriber->email }}</td>
                                        <td >
                                            @if ($subscriber->trashed())
                                                {{'Trashed'}}
                                            @else
                                                {{'Active'}}
                                            @endif
                                        </td>
                                        <td class="d-flex flex-row">

                                            @if ($subscriber->trashed())
                                                <a class="btn btn-sm btn-info rounded-pill px-3" href="{{route('restore.subscriber', $subscriber->id)}}">Restore</a>
                                            @else
                                                <form action="{{ route('trash.subscriber',$subscriber->id )}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-warning rounded-pill px-3">Archive/Trash</button>
                                                </form>
                                            @endif

                                            @if ($subscriber->trashed())
                                                <form action="{{ route('destroy.subscriber',$subscriber->id )}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger rounded-pill px-3 btn-delete-subscriber"
                                                    data-id="{{$subscriber->id}}">Delete Permanently</button>
                                                </form>
                                            @endif
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
