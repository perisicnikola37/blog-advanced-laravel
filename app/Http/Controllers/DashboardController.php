<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    // Instead of adding middleware inside "web.php"
    // public function __construct()
    // {
    //     $this->middleware(['auth']);
    // }
    
    public function index() {
        return view('dashboard');
    }

}
