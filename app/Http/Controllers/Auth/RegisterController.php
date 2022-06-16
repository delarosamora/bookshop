<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\UserRegistered;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{

    public function index(){
        return view('auth.register');
    }

    public function register(Request $request){
        $credentials = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'nif' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'nif' => $request->input('nif'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        Mail::to($user)->send(new UserRegistered($user));
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Bienvenido ' . Auth::user()->name . ' ' . Auth::user()->surname);
    }
}
