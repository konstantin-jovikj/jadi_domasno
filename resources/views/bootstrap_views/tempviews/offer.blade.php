@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container">


        <form class="p-5 border shaddow mt-5" action="{{ route('store.offer') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="cook_recepient">Одбери Готвач:</label>
                    <select class="form-control rounded-custom" name="cook_recepient" id="cook_recepient">
                        @foreach ($cooks as $cook)
                            <option value="{{ $cook->id }}">{{ $cook->user->name . ' ' . $cook->user->surname }}</option>
                        @endforeach
                    </select>
                    @error('cook_recepient')
                        <small id="cook_recepient-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="offer_title">Наслов:</label>
                    <input type="text" class="form-control rounded-custom"
                        id="offer_title"
                        name="offer_title"
                        value="{{old('offer_title')}}">
                    @error('offer_title')
                        <small id="offer_title-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-row ">
                <div class="form-group col-12">
                    <label for="offer_text">Порака:</label>
                    <textarea class="form-control rounded-custom h-100" id="offer_text" name="offer_text" value="">{{old('offer_text')}}</textarea>
                    @error('offer_text')
                        <small id="offer_text-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row d-flex justify-content-center my-5">
                <button type="submit" class="btn btn-domasno w-25 rounded-pill" >Испрати</button>
            </div>

        </form>

    </div>
@endsection
