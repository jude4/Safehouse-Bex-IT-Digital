<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required']
        ]);

        if (auth()->attempt($request->only('email', 'password'), $request->rememberToken)) {

             $request->session()->regenerate();

           
        } else {

            return response()->json([
                'message' => 'The provided credentials do not match our records.'
            ], 401);
        }
    }
}
