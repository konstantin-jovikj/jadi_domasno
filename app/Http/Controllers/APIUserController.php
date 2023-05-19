<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\Cook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ApiLoginRequest;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Requests\APIUpdateUserRequest;
use App\Http\Requests\APIRegisterUserRequest;

class APIUserController extends Controller
{
    public function register(APIRegisterUserRequest $request)
    {

        $user = new User();

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role;
        $user->birth_date = $request->birth_date;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->municipality_id = $request->municipality;
        $user->profile_img_url = $request->profile_img_url;
        $user->about = $request->about;
        $user->other = $request->other;

        $user->save();

        event(new Registered($user));

        Auth::login($user);

        if ($request->role == 2) {
            $user = auth()->user();

            $cook = new Cook();

            $cook->user_id = $user->id;
            $cook->delivery_instructions = $request->delivery_instructions;
            $cook->web = $request->web;
            $cook->facebook = $request->facebook;
            $cook->instagram = $request->instagram;

            $cook->save();
        }
        return response()->json(['message' => 'User created successfully']);
    }


    public function update(APIUpdateUserRequest $request, User $user)
    {
        $userId = auth()->user->role_id;
        $userEmail = auth()->user->email;

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $userEmail;
        $user->role_id = $request->role;
        $user->birth_date = $request->birth_date;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->municipality_id = $request->municipality;
        $user->profile_img_url = $request->profile_img_url;
        $user->about = $request->about;
        $user->other= $request->other;

        $user->cook->delivery_instructions = $request->delivery_instructions;
        $user->cook->web = $request->web;
        $user->cook->facebook = $request->facebook;
        $user->cook->instagram = $request->instagram;
        $user->cook->save();
        $user->role_id = $userId;
        $user->save();

        return response()->json(['message' => 'User updated successfully']);
    }

    public function APIloginUser(ApiLoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return response()->json(['error' => 'Login error']);
        }
        if(Hash::check($request->password, $user->password)){
            $data = [
                'success' => 'You are logged in successfully',
                'token' => $user->createToken('customUserToken')->plainTextToken,
                'role_id' => $user->role_id
            ];
            return response()->json($data);
        }
        return response()->json(['error' => 'Login error']);
    }
}
