<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Invoice; 
use App\Models\User_Invoice;

class AdminController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }

    public function login(Request $request){
        //check if exists?? route acc to admin or not (admin panel/userpanel )
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = User::where('name', $request->name)->first();
            if($user->is_admin == 1) {
                return redirect()->intended(route('admin.home'));
            }
            // $invoices = User::where('name', $user->name)->firstOrFail()->invoices();
            $invoices = $user->invoices()->get();
            // For debugging purposes
            // dd($invoices);
            return view('auth.normal_user.user_home', compact('invoices'));
        }
 
        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');

        // \Log::info(json_encode($request->all()));
    }

    public function allocateView() {
        return view('auth.admin.allocate_invoice');
    }

    public function getDash(){
        return view('auth.admin.admin_panel');
    }

    public function getUserDash(){
        return view('auth.normal_user.user_home');
    }

    public function allocate(Request $request) {
        // \Log::info(json_encode($request->all()));
    
        $username = $request->name;
        $titlename = $request->title;

        $user = User::where('name', $username)->first();
        $invoice = Invoice::where('title', $titlename)->first();

        if($user and $invoice) {
            $userId = $user->id;
            $invoiceId = $invoice->id;
            User_Invoice::createAllocation($userId, $invoiceId);
        }
        else{
            $err_message = 'bad input'; 
        }

        return view('auth.admin.allocate_invoice');

    }
}
