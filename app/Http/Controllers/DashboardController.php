<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
