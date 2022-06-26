<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\{Blog,User};
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $clientIP = \Request::ip();


        $validatedData = $request->validated();

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->status = 1;
        $user->tutor_also = 0;
        $user->ip_address = $clientIP;
        $user->save();
        Auth::login($user);
        event(new Registered($user));
        if(auth()->user()->role == 'student')
        {
            return redirect()->route('home');
        }
        else
        {

            return redirect()->route('course.index');

        }
    }
}
