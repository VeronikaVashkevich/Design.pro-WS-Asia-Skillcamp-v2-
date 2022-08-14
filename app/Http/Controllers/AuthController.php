<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $user;


    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register()
    {
        return view('auth.register');
    }

    public function signUp(UserRegisterRequest $request)
    {
        $request->validated();

        $user = $this->user->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'login' => $request->get('login'),
            'password' => Hash::make($request->get('password')),
            'is_admin' => false,
        ]);

        auth()->login($user);

        return redirect('/home');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function signIn(UserLoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->is_admin) {
                return redirect('/admin-panel');
            }

            return redirect('/home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
