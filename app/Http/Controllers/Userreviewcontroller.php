<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Userreviewcontroller extends Controller
{
    public function index()
    {
        return view('user_review');
    }
}
