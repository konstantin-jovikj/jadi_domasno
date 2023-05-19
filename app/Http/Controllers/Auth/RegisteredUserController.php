<?php

namespace App\Http\Controllers\Auth;

use App\Events\VerifyEmail;
use App\Models\Cook;
use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use App\Models\Municipality;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Mail\verifyUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $roles = Role::where('role_name', '<>', 'admin')->get();
        $municipalities = Municipality::all();
        return view('bootstrap_views.auth.register', compact('roles', 'municipalities'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'],
            'birth_date' => ['date', 'before:today'],
            'phone' => ['required', 'unique:users,phone'],
            'address' => ['required', 'string', 'max:255'],
            'municipality' => ['required', 'string', 'max:255'],
            'profile_img_url' => ['url'],
            'about'=> ['max:255'],
            'other'=> ['max:255'],
            'delivery_instructions' => ['max:255'],
            'web' => ['url', 'nullable'],
            'facebook' => ['url', 'nullable'],
            'instagram' => ['url', 'nullable'],
        ]);



        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'address' => $request->address,
            'municipality_id' => $request->municipality,
            'profile_img_url' => $request->profile_img_url,
            'about'=> $request->about,
            'other'=> $request->other,
        ]);
        $user->save();

        $userID = $user->id;

        if ($request->role == 2) {
            // $user = Auth::user();
            $cook = Cook::create([
                'user_id' => $userID,
                'delivery_instructions' => $request->delivery_instructions,
                'web' => $request->web,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
            ]);
            $cook->save();
        }
        event(new VerifyEmail($user));
        // dd($cook);
        return redirect()->route('login')->with('success', 'Validation email is sent to your email address');
    }
}
