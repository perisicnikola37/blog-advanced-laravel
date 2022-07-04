<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends Controller
{
    
    public function index() {
        
        return view('admin.quotes.index');

    }

    public function store(Request $request) {

        $input = $request->all();

        // Using External Request
        $this->validate($request, [
            'author' => 'required',
            'body' => 'required',
        ]);

        // Quote::create([
        //     'author' => $request->author,
        //     'body' => $request->body,
        //     'user_id' => Auth::user()->id,
        // ]);

        Auth::user()->quotes()->create($input)->with('session', 'ss');

        return back()->with('success-quote', 'You have successfully published your quote!');

    }



}
