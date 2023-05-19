<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use App\Models\Municipality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ProfileCustomUpdateRequest;

class ProfileController extends Controller
{


    public function edit()
    {

        $user = Auth::user();

        $municipalities = Municipality::all();
        return view('bootstrap_views.profile.edit', compact('user', 'municipalities'));
    }



    public function update(ProfileCustomUpdateRequest $request, User $user): RedirectResponse
    {

        $userId = Auth::user()->role_id;
        $userEmail = Auth::user()->email;

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
        // dd($userId);
        $user->cook->save();
        $user->role_id = $userId;
        // dd($user);
        $user->save();


        return Redirect::route('profile.edit')->with('success', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
