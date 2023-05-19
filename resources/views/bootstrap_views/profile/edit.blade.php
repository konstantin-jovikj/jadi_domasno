@extends('bootstrap_views.layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <strong>Success</strong> {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5">
                <form class="p-5 border shaddow" action="{{ route('profile.update', $user->id) }}" method="POST">
                    @csrf
                    @method('patch')

                    <div class="row">
                        <div class="col-8 offset-2 text-center ">
                            <div class="h4 border-bottom pb-3 text-danger">Edit Profile</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <input type="hidden" class="form-control rounded-custom" id="role" name="role"
                                value="{{ $user->role_id }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <label for="name">Name</label>
                            <input type="text" class="form-control rounded-custom" id="name" name="name"
                                value="{{ $user->name }}">
                            @error('name')
                                <small id="name-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control rounded-custom" id="surname" name="surname"
                                value="{{ $user->surname }}">
                            @error('surname')
                                <small id="surname-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="form-group col-4">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control rounded-custom" id="address" name="address"
                                value="{{ $user->address }}">
                            @error('address')
                                <small id="address-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                    </div>




                    <div class="row">

                        <div class="form-group col-4">
                            <label for="birth_date">Birth Date</label>
                            <input type="date" class="form-control rounded-custom" id="birth_date" name="birth_date"
                                value="{{ $user->birth_date }}">
                            @error('birth_date')
                                <small id="birth_date-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-4">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control rounded-custom" id="phone" name="phone"
                                value="{{ $user->phone }}">
                            @error('phone')
                                <small id="phone-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>



                        <div class="form-group col-4">
                            <label for="municipality">Municipality:</label>

                            <select class="form-control rounded-custom" name="municipality" id="municipality">
                                @foreach ($municipalities as $municipality)
                                    <option value="{{ $municipality->id }}"
                                        {{ $user->municipality_id === $municipality->id ? 'selected' : '' }}>
                                        {{ $municipality->municipality }}
                                    </option>
                                @endforeach
                            </select>

                            @error('municipality')
                                <small id="municipality-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="profile_img_url">New profile Image URL:</label>
                        <input type="text" class="form-control rounded-custom" placeholder="Optional..."
                            id="profile_img_url" name="profile_img_url" value="{{ $user->profile_img_url }}">
                        @error('profile_img_url')
                            <small id="profile_img_url-message" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row">

                        <div class="form-group col-4">
                            <label for="profile_img_url">Profile Image:</label>
                            <div class="profile-image-wrapper">
                                <img src="{{ $user->profile_img_url }}" alt="Profile Image"
                                    class="img-fluid img-thumbnail shadow">
                            </div>

                        </div>

                        <div class="form-group col-4">
                            <label for="about">About:</label>
                            <textarea class="form-control rounded-custom h-100" placeholder="Optional..." id="about" name="about"
                                value="{{ $user->about }}" rows="4">{{ $user->about }}</textarea>
                            {{-- @error('about')
                                <small id="municipality-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror --}}
                        </div>
                        <div class="form-group col-4">
                            <label for="other">Other:</label>
                            <textarea class="form-control rounded-custom h-100" placeholder="Optional..." id="other" name="other"
                                value="{{ $user->other }}" rows="4">{{ $user->other }}</textarea>
                            {{-- @error('about')
                            <small id="municipality-message" class="form-text text-danger">{{ $message }}</small>
                        @enderror --}}
                        </div>
                    </div>

                    <div class="row cook-row mt-5 d-none">

                        <div class="form-group col-12">
                            <label for="delivery_instructions">Delivery Instructions:</label>
                            <textarea class="form-control rounded-custom h-100" placeholder="Delivery Instructions..." id="delivery_instructions" name="delivery_instructions"
                                value={{ optional($user->cook)->delivery_instructions ?? '' }}" rows="4">{{ optional($user->cook)->delivery_instructions ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="row cook-row mt-5 d-none">

                        <div class="form-group col-4">
                            <label for="web">Web: </label>
                            <input type="text" class="form-control rounded-custom" id="web" name="web"
                            value="{{ optional($user->cook)->web ?? '' }}">
                            @error('web')
                                <small id="web-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="facebook">Facebook: </label>
                            <input type="text" class="form-control rounded-custom" id="facebook" name="facebook"
                            value="{{ optional($user->cook)->facebook ?? '' }}">
                            @error('facebook')
                                <small id="facebook-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="instagram">Instagram: </label>
                            <input type="text" class="form-control rounded-custom" id="instagram" name="instagram"
                            value="{{ optional($user->cook)->instagram ?? '' }}">
                            @error('instagram')
                                <small id="instagram-message" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-center mt-5">

                        <button type="submit" class="btn btn-domasno w-50 rounded-pill">Update Profile Info</button>

                    </div>
                </form>
            </div>
        </div>


        <div class="row">
            <div class="col-12 mt-5">
                <form class="p-5 border shaddow" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-8 offset-2 text-center ">
                            <div class="h4 border-bottom pb-3 text-danger">Change Password</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="current_password">Current Password:</label>
                            <input type="password" class="form-control rounded-custom" id="current_password"
                                name="current_password" value="{{ $user->current_password }}">


                            @if ($errors->updatePassword->has('current_password'))
                            <small id="current_password_error"
                            class="form-text text-danger">{{ $errors->updatePassword->first('current_password') }}</small>
                        @endif
                        </div>
                        <div class="form-group col-4">
                            <label for="password">New Password:</label>
                            <input type="password" class="form-control rounded-custom" id="password" name="password"
                                value="{{ $user->password }}">

                            @if ($errors->updatePassword->has('password'))
                                <small id="password_error"
                                class="form-text text-danger">{{ $errors->updatePassword->first('password') }}</small>
                            @endif

                        </div>


                        <div class="form-group col-4">
                            <label for="password_confirmation">Confirm Password:</label>
                            <input type="password" class="form-control rounded-custom" id="password_confirmation"
                                name="password_confirmation" value="{{ $user->password_confirmation }}">


                            @if ($errors->updatePassword->has('password_confirmation'))
                                <small id="address-message"
                                    class="form-text text-danger">{{ $errors->updatePassword->first('password_confirmation') }}</small>
                            @endif

                        </div>
                    </div>



                    <div class="form-group d-flex justify-content-center mt-5">

                        <button type="submit" class="btn btn-domasno w-50 rounded-pill">Change Password</button>

                    </div>
                </form>
            </div>
        </div>



            {{-- DELETE PROFILE --}}

            <div class="row">
                <div class="col-12 mt-5">
                    <form class="p-5 border shaddow" action="{{ route('profile.destroy') }}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="row">
                            <div class="col-8 offset-2 text-center ">
                                <div class="h4 border-bottom pb-3 text-danger">Delete Profile</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 offset-1">
                                <p>Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-6">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control rounded-custom" id="password" name="password"
                                    value="{{ $user->password }}">

                                @if ($errors->userDeletion->has('password'))
                                    <small id="password_error"
                                    class="form-text text-danger">{{ $errors->userDeletion->first('password') }}</small>
                                @endif

                            </div>


                            <div class="d-flex justify-content-center align-items-center col-6">

                                <button type="submit" class="btn btn-domasno w-50 rounded-pill">Delete Profile</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

    </div>
@endsection
