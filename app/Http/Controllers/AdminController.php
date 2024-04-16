<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }

    public function allocate() {
        return view('auth.admin.allocate_invoice');
    }

    public function getDash(){
        return view('auth.admin.admin_panel');
    }

    public function getUserDash(){
        return view('auth.normal_user.user_home');
    }
}
