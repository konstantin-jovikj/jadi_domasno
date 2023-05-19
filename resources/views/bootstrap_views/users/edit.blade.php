@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-5">
                <form class="p-5 border shaddow" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control rounded-custom" id="name" name="name" value="{{$user->name}}">
                            @error('name')
                                <small id="name-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control rounded-custom" id="surname" name="surname" value="{{ $user->surname}}">
                            @error('surname')
                                <small id="surname-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-6">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control rounded-custom" id="email" name="email" value="{{$user->email}}">
                            @error('email')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="role">Register as:</label>
                            <select  class="form-control rounded-custom" name="role" id="role">
                                @foreach ( $roles as $role )
                                    <option value="{{ $role->id }}">{{ $role->role_name}}</option>
                                @endforeach
                            </select>

                            @error('role')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                    <div class="form-group col-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control rounded-custom" id="password" name="password">
                        @error('password')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                        <div class="form-group col-6">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control rounded-custom" id="password_confirmation" name="password_confirmation">
                            @error('password_confirmation')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-6">
                            <label for="birth_date">Birth Date</label>
                            <input type="date" class="form-control rounded-custom" id="birth_date" name="birth_date" value="{{$user->birth_date}}">
                            @error('birth_date')
                            <small id="birth_date-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control rounded-custom" id="phone" name="phone" value="{{$user->phone}}">
                            @error('phone')
                            <small id="phone-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-8">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control rounded-custom" id="address" name="address" value="{{$user->address}}">
                            @error('address')
                                <small id="address-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                            <div class="form-group col-4">
                                <label for="municipality">Municipality:</label>

                                <select  class="form-control rounded-custom" name="municipality" id="municipality">
                                    @foreach ( $municipalities as $municipality )
                                        <option value="{{ $municipality->id }}">{{ $municipality->municipality}}</option>
                                    @endforeach
                                </select>

                                @error('municipality')
                                    <small id="municipality-message" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="profile_img_url">Profile Image URL:</label>
                        <input type="text" class="form-control rounded-custom" placeholder="Optional..." id="profile_img_url" name="profile_img_url" value="{{$user->profile_img_url}}">
                        @error('profile_img_url')
                        <small id="profile_img_url-message" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="about">About:</label>
                            <textarea  class="form-control rounded-custom" placeholder="Optional..." id="about" name="about" value="{{$user->about}}" rows="4"></textarea>
                            {{-- @error('about')
                                <small id="municipality-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror --}}
                    </div>
                    <div class="form-group col-6">
                        <label for="other">Other:</label>
                        <textarea  class="form-control rounded-custom" placeholder="Optional..." id="other" name="other" value="{{ $user->other }}" rows="4"></textarea>
                        {{-- @error('about')
                            <small id="municipality-message" class="form-text text-danger">{{ $message }}</small>
                        @enderror --}}
                </div>
                    </div>
                    <div class="form-group d-flex justify-content-center mt-5">

                            <button type="submit" class="btn btn-domasno w-50 rounded-pill">Update</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
