<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.admin.readuser');
    }

    public function create(Request $request)
    {
        return view('auth.admin.createuser');
    }
    
}
