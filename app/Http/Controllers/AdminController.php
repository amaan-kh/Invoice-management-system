<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Invoice; 
use App\Models\User_Invoice;

class AdminController extends Controller
{
    //
    public function index(){
        return view('welcome');
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
