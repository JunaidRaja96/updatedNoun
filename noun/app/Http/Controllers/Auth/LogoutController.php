<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function admin(Request $request) {
        auth()->logout();
        return redirect()->route('auth.admin-login');
      }
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('auth.login');
    }
}
