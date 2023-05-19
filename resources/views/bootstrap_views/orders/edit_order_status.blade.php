@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container">


        <form class="p-5 border shaddow mt-5" action="{{ route('update_order.status', $order->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="form-row">

                <div class="form-group col-12">
                    <label for="statusEdit">Change Order Status:</label>
                    <select class="form-control rounded-custom" name="statusEdit" id="statusEdit">
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" {{$order->status_id == $status->id ? 'selected': ''}}>{{ $status->status_type }}</option>
                        @endforeach
                    </select>
                    @error('statusEdit')
                        <small id="statusEdit-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="row d-flex justify-content-center my-5">
                <button type="submit" class="btn btn-domasno w-25 rounded-pill" >Update</button>
            </div>

        </form>

    </div>
@endsection
