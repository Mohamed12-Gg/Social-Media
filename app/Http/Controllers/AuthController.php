<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8|max:50',
        ], [
            'email.required'    => 'Please enter your email',
            'email.email'       => 'Please enter a valid email',
            'password.required' => 'Please enter your password',
            'password.min'      => 'Password must be at least 8 characters',
            'password.max'      => 'Password must be less than 50 characters',
        ]);


        try {
            $isLogin = Auth::attempt([
                'email'    => $request->email,
                'password' => $request->password,
            ], $request->remember_me);

            if (!$isLogin) {
                return redirect()->route('login')->with('msg', 'Invalid email or password');
            }

            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin')->with('msg', 'Welcome Admin!');
            }

            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect()->route('login')->with('msg', 'Invalid email or password');
        }
    }



    public function  registar()
    {
        return view('auth.registar');
    }

    public function handleRegistar(Request $request)
    {
        $data =  $request->validate([
            'name'                  => 'required|string|min:3',
            'email'                 => 'required|email|unique:users,email',
            'phone'                 => 'nullable|string|max:15|unique:users,phone',
            'password'              => 'required|min:8|max:50|confirmed',
            'password_confirmation' => 'required',
        ], [
            // Name
            'name.required' => 'Please enter your name',
            'name.string'   => 'Name must be text',
            'name.min'      => 'Name must be at least 3 characters',

            // Email
            'email.required' => 'Please enter your email',
            'email.email'    => 'Please enter a valid email',
            'email.unique'   => 'Email already exists',

            // Phone
            'phone.max'    => 'Phone must be less than 15 digits',
            'phone.unique' => 'Phone number already exists',

            // Password
            'password.required'  => 'Please enter your password',
            'password.min'       => 'Password must be at least 8 characters',
            'password.max'       => 'Password must be less than 50 characters',
            'password.confirmed' => 'Passwords do not match',

            // Confirm Password
            'password_confirmation.required' => 'Please confirm your password',

        ]);
        $data['password'] = Hash::make($data['password']);

        UserModel::create($data);

        return redirect()->route('login')->with('msg', 'User Created Successfully');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('msg', 'Log out Successfully');
    }
}
