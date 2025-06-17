<?php

namespace App\Http\Controllers;

use App\Mail\EmailVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {

        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // It must be unique in users table
            'password' => 'required|string|confirmed|min:8', // password_confirmation must match
        ]); // No need to validate checkboxes

        $isTeacher = $request->has('is_teacher');

        if ($isTeacher) {
            $user = User::create([
                'user_name' => $validatedData['username'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']), // hash password before saving
                'role' => 'user',
            ]);

            Auth::login($user);
            $admins = User::all()->where('role', 'admin');

            foreach ($admins as $admin) {
                Mail::to($admin->email)->send(new EmailVerify($user));
            }

            return redirect()->route('home')->with('status', __('register.confirmTeacher'));
        } else {
            $user = User::create([
                'user_name' => $validatedData['username'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']), // hash password before saving
                'role' => 'user',
                'email_verified_at' => now(),
            ]);

            Auth::login($user);

            return redirect()->route('home')->with('status', __('register.confirmUser'));
        }

    }

    public function login(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('status', __('register.loginSuccess'));
        } else {
            return back()->withErrors(['auth' => 'Wrong email or password.'])->withInput();
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
