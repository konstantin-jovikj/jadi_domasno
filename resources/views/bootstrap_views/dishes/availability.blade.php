@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 mt-5">
                <form class="p-5 border shaddow" action="{{ route('available.date', $curentDish) }}" method="POST">
                    @csrf
                    <H1>Availability of the dish</H1>
                    <p>{{ $curentDish->dish_name}}</p>

                    <div class="row">

                        <div class="form-group col-6">
                            <label for="available_date">Available on:</label>
                                @php $today = date('Y-m-d'); @endphp
                            <input type="date" min="{{ $today }}" class="form-control rounded-custom" id="available_date"
                                name="available_date" value="">
                            @error('available_date')
                                <small id="available_date-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="portions_number">Number of Portions:</label>
                            <input type="number" class="form-control rounded-custom" min="1"
                                id="portions_number" name="portions_number" value="">
                            @error('portions_number')
                                <small id="portions_number-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="row d-flex justify-content-center my-5">
                        <button type="submit" class="btn btn-domasno w-20 rounded-pill">
                            Add New Dish Availability Date
                        </button>
                    </div>
                </form>
                    <table class="table table-sm table-hover mt-5">
                        <thead class="bg-dark-custom thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Portions</th>

                                <th scope="col" style="width: 28%">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($availableDates); --}}
                            @foreach ( $availableDates as $availableDate)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $availableDate->available_date }}</td>
                                    <td>{{ $availableDate->portions_nr }}</td>
                                    <td>
                                        <form action="{{ route('delete.date', $availableDate->id) }}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-sm btn-danger rounded-pill px-3 btn-delete-date" data-id="{{ $availableDate->id }}">Delete</button>
                                        </form>
                                        </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
