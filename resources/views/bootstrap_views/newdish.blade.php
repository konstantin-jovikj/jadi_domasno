@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container">


        <form class="p-5 border shaddow mt-5" action="{{ route('add.dish') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-5">
                    <label for="dishname">Dish Name:</label>
                    <input type="text" class="form-control rounded-custom" id="dishname" name="dishname" value="{{old('dishname')}}">
                    @error('dishname')
                        <small id="dishname-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-5">
                    <label for="dish_image">Dish Image:</label>
                    <input type="text" class="form-control rounded-custom" id="dish_image" name="dish_image"
                        value="{{old('dish_image')}}">
                    @error('dish_image')
                        <small id="dish_image-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-2">
                    <label for="spiciness">Spiciness:</label>
                    <select class="form-control rounded-custom" name="spiciness" id="spiciness">
                        @foreach ($spiciness as $spicy)
                            <option value="{{ $spicy->id }}">{{ $spicy->spicylevel }}</option>
                        @endforeach
                    </select>
                    @error('spiciness')
                        <small id="spiciness-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-row ">
                <div class="form-group col-4">
                    <label for="ingredients">Ingredients:</label>
                    <textarea class="form-control rounded-custom h-100" id="ingredients" name="ingredients" value="">{{old('ingredients')}}</textarea>
                    @error('ingredients')
                        <small id="ingredients-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="description">Description:</label>
                    <textarea class="form-control rounded-custom h-100" id="description" name="description" value="">{{old('description')}}</textarea>
                    @error('description')
                        <small id="description-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="heating_instructions">Heating Instructions:</label>
                    <textarea class="form-control rounded-custom h-100" id="heating_instructions" name="heating_instructions"
                        value="">{{old('heating_instructions')}}</textarea>
                    @error('heating_instructions')
                        <small id="heating_instructions-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-row mt-4">
                <div class="form-group col-4">
                    <label for="hashtag">Hashtag:</label>
                    <input type="text" class="form-control rounded-custom" id="hashtag" name="hashtag" value="{{old('hashtag')}}">
                    @error('hashtag')
                        <small id="hashtag-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="prep_time">Preparation Time:</label>
                    <input type="text" class="form-control rounded-custom" id="prep_time" name="prep_time"
                        value="{{old('prep_time')}}">
                    @error('prep_time')
                        <small id="prep_time-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="portion_size">Portion Size:</label>
                    <input type="text" class="form-control rounded-custom" id="portion_size" name="portion_size"
                        value="{{old('portion_size')}}">
                    @error('portion_size')
                        <small id="portion_size-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-row mt-4">
                <div class="form-group col-4">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control rounded-custom" min="0.00" id="price"
                        name="price" value="{{old('price')}}">
                    @error('price')
                        <small id="price-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-4">
                    <label for="promo_price">Promotional price:</label>
                    <input type="number" class="form-control rounded-custom" min="0.00"
                        id="promo_price" name="promo_price" value="{{old('promo_price')}}">
                    @error('promo_price')
                        <small id="promo_price-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-4">
                    <label for="promo_price_date">Promotional Price Ends on:</label>
                        @php $today = date('Y-m-d'); @endphp
                    <input type="date" min="{{ $today }}" class="form-control rounded-custom" id="promo_price_date"
                        name="promo_price_date" value="{{old('promo_price_date')}}">
                    @error('promo_price_date')
                        <small id="promo_price_date-message" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-6 ">
                    <p class="mb-3">Alergens:</p>
                    <select class="js-example-basic-multiple form-control select2" name="alergens[]" multiple="multiple">
                        @foreach($alergens as $alergen )
                            <option value="{{ $alergen->id }}">{{ $alergen->alergen_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-6 ">
                    <p class="mb-3">Category:</p>
                    <select class="js-example-basic-multiple form-control select2" name="category[]" multiple="multiple" placeholder="Categories">
                        @foreach($categories as $category )
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row d-flex justify-content-center my-5">
                <button type="submit" class="btn btn-domasno w-25 rounded-pill" >Add</button>
            </div>

        </form>

    </div>
@endsection
