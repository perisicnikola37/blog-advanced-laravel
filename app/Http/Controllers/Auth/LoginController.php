<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function index() {
        return view('auth.login');
    }

    public function store(UserLoginRequest $request) {
        
        // Using External Request
        // $this->validate($request, [
            // 'email' => 'required|min:2|max:255|email',
            // 'password' => 'required|min:8',
        // ]);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid credentials!');
        }

        session()->flash('logged-in', 'Logged in!');

        return redirect()->route('home')->withFragment('logged-in');

    }

}
