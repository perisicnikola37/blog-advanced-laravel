<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user = Auth::user();

        return view('users.profile_page', [
            'user' => $user,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        
        $input = $request->all();

        $user = Auth::user();   
        
        if ($file = $request->file('picture')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('storage/profile_images', $name);

            $input['picture'] = $name; 
            
            $input['random'] = 'no-picture';

        }

        $user->whereId($id)->first()->update($input);

        // if(isset($user)) {
        //     $user->posts()->create($input);
        //     session()->flash('success', '
        //     Blog post successfully published!!');
        //     } else {
        //     session()->flash('failure', 'Blog posting failed!');
        //     }

        session()->flash('success-profile', 'You successfully updated your profile!');

        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
