<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'password|string|min:8|confirmed'
        ]);

        $user = User::create($request->all());


    }
}
