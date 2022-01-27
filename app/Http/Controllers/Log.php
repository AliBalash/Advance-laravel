<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Log extends Controller
{
    public function log()
    {
        return view('category.index0');
    }

    public function register(Request $request)
    {
        $user  = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        if ($user){
            Auth::loginUsingId($user->id);
            return redirect(RouteServiceProvider::HOME);
        }else{
            return 'no Login';
        }
    }

    public function logg(Request $request)
    {
        $credentials = $request->only('email','password');
        $user = User::where('email', $request->email)->first();
        $login = Auth::attempt($credentials);
        if ($login){
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        }else{
            return 'no Login';
        }
    }
}
