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
            // abort(403, 'Unauthorized');
            return redirect()->route('index');
        }
        $non_admin_users = User::getUsers();
        $admin_users = User::getAdUsers();

        return view('auth.admin.readuser', compact('non_admin_users', 'admin_users'));
    }

    public function create()
    {   
        if (!Gate::allows('isAdmin')) {
            // abort(403, 'Unauthorized');
            return redirect()->route('index');
        }
        return view('auth.admin.createuser');
    }

    public function updateGet($name) {
        if (!Gate::allows('isAdmin')) {
            // abort(403, 'Unauthorized');
            return redirect()->route('index');
        }
        $user = User::where('name', $name)->first();
        if(!$user || $user->is_admin == 1) {
            return redirect()->back();
        }
        return view('auth.admin.updateuser', compact('user'));
    }
    public function store(Request $request)
    {   
        if (!Gate::allows('isAdmin')) {
            // abort(403, 'Unauthorized');
            return redirect()->route('index');
        }
        // dd($request->all());
        // \Log::info(json_encode($request->all()));
        $message = User::createUser($request->username, $request->password, $request->is_admin, $request->fullname, $request->phone, $request->address);


        return view('auth.admin.createuser')->with('error_message', $message);
    }
    public function update(Request $request) {

        if (!Gate::allows('isAdmin')) {
            // abort(403, 'Unauthorized');
            return redirect()->route('index');
        }
         // dd($request->all());
         $data = [
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'address' => $request->address,
            'is_admin' => $request->is_admin,
         ];
         $user = User::where('name', $request->username)->first();
         if (!$user) {
        // Handle the error, such as returning an error message
            $message = 'Invoice not found';
        }
        else{
            $user->fill($data);
            $user->save();
            $message =  "user updated successfully";
        }

        $non_admin_users = User::getUsers();
        $admin_users = User::getAdUsers();

        return view('auth.admin.readuser', compact('non_admin_users', 'admin_users'));

    }
        public function deleteUserView(){
             if (!Gate::allows('isAdmin')) {
            // abort(403, 'Unauthorized');
                return redirect()->route('index');
        }
            $users = User::where('is_admin', 0)->get();
            return view('auth.admin.deleteuser', compact('users'));
        }

        public function deleteUser(Request $request){
             if (!Gate::allows('isAdmin')) {
            // abort(403, 'Unauthorized');
                return redirect()->route('index');
        }
            
            // \Log::info(json_encode($request->username));
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
