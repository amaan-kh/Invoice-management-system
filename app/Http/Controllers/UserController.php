<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;    


class UserController extends Controller
{   

    //view all users
    public function index() {
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }
        $non_admin_users = User::getUsers();
        $admin_users = User::getAdUsers();

        return view('auth.admin.readuser', compact('non_admin_users', 'admin_users'));
    }


    //view create user page
    public function create() {   
        
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }
        return view('auth.admin.createuser');
    }


    //view update user page
    public function updateGet($name) {
        
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }

        $user = User::where('name', $name)->first();
        if(!$user || $user->is_admin == 1) {
            return redirect()->back();
        }

        return view('auth.admin.updateuser', compact('user'));
    }


    //creating user
    public function store(Request $request)
    {   
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }
        $message = User::createUser($request->username, $request->password, $request->is_admin, $request->fullname, $request->phone, $request->address);

        return view('auth.admin.createuser')->with('error_message', $message);
    }


    //updating user
    public function update(Request $request) {

        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }
        $data = [
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'address' => $request->address,
            'is_admin' => $request->is_admin,
        ];
        $message = "";
        $user = User::where('name', $request->username)->first();
        
        if (!$user) {
            $message = 'User not found';
        }
        else{
            $user->fill($data);
            $user->save();
            $message =  "user updated successfully";
        }

        return response()->json([
            "err_message" => $message,
        ]);

        $non_admin_users = User::getUsers();
        $admin_users = User::getAdUsers();

        return view('auth.admin.readuser', compact('non_admin_users', 'admin_users'));
    }
        

    //NOTE: this view isn't used now
    // public function deleteUserView(){
    //         if (!Gate::allows('isAdmin')) {
    //         return redirect()->route('index');
    // }
    //     $users = User::where('is_admin', 0)->get();
    //     return view('auth.admin.deleteuser', compact('users'));
    // }


    //deleting user 
    public function deleteUser(Request $request){
        
        if (!Gate::allows('isAdmin')) {
        return redirect()->route('index');
        }            
        
        $exist = User::where('name', $request->username)->first();
        if($exist) {
            $exist->delete();
            $message = 'deleted successfully';
            return redirect()->route('user.index')->with('error_message',$message);
            $users = User::where('is_admin', 0)->get();
            return view('auth.admin.deleteuser', compact('users'))->with('error_message',$message);
        }
        $message = 'user does not exist ';
        return redirect()->route('user.index')->with('error_message',$message);
        $users = User::where('is_admin', 0)->get();
        return view('auth.admin.deleteuser', compact('users'))->with('error_message',$message);
    }
    
}
