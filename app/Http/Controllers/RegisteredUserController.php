<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store() {
        $attrs = request()->validate([
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email' => ['required','email','max:254'],
            'password'=>['required'],
        ]);

        $user = User::create($attrs);

        Auth::login($user);

        return redirect('/jobs');
    }
}
