<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index() {
        return view('auth.register');
    }

    public function store(UserRegisterRequest $request) {
        
        // Using External Request
        // $this->validate($request, [
        //     'name' => 'required|min:2|max:255',
        //     'username' => 'required|min:2|max:255',
        //     'email' => 'required|min:2|max:255|email',
        //     'password' => 'required|min:8|confirmed',
        // ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('home');

    }

}
