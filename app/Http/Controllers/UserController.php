<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.admin.readuser');
    }

    public function create()
    {
        return view('auth.admin.createuser');
    }

    public function store(Request $request)
    {
        // \Log::info(json_encode($request->all()));
        User::createUser($request->username, $request->password, $request->is_admin);


        return view('auth.admin.createuser');
    }
    
}
