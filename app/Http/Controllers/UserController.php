<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;    


class UserController extends Controller
{
    public function index()
    {
         if (!Gate::allows('isAdmin')) {
            abort(403, 'Unauthorized');
        }
        [$non_admin_users, $admin_users] = User::getUsers();

        return view('auth.admin.readuser', compact('non_admin_users', 'admin_users'));
    }

    public function create()
    {   
        if (!Gate::allows('isAdmin')) {
            abort(403, 'Unauthorized');
        }
        return view('auth.admin.createuser');
    }

    public function store(Request $request)
    {   
        if (!Gate::allows('isAdmin')) {
            abort(403, 'Unauthorized');
        }
        // \Log::info(json_encode($request->all()));
        User::createUser($request->username, $request->password, $request->is_admin);


        return view('auth.admin.createuser');
    }
    
}
