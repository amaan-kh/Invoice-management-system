<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Invoice; 
use App\Models\User_Invoice;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;    


class AdminController extends Controller
{
    //returns main view of app
    public function index(){
        return view('welcome');
    }


    //routing to admin/user views after authentication
    public function login(Request $request){

        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        //if authenticated then routed to admin/user views
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();            
            $user = User::where('name', $request->name)->first();
            
            if($user->is_admin == 1) {
                return redirect()->intended(route('admin.home'));
            }

            return redirect()->intended(route('user.home', ['name' => $request->name]));
        }
        
        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');
    }


    //logout from app
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    //view for allocating particular invoice to all users listed
    public function allocateView($id) {
        
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }
        
        $users = User::where('is_admin', 0)->get();
        $invoice = Invoice::where('invoice_number', $id)->first();
        
        if (is_null($users) || is_null($invoice)) {
            return redirect()->back()->with('error_message', 'Invoice or user not found.');
        }
        return view('auth.admin.allocate_invoice', compact('users', 'invoice'));
    }


    //admin dashboard view
    public function getDash(){
        if (!Gate::allows('isAdmin')) {
        return redirect()->back()->with('error', 'You are not authorized to view that page.');
        }
        return view('auth.admin.admin_panel');
    }


    //user dashboard view
    public function getUserDash($name){
        
        if (Gate::allows('isUserName', $name)) {
            $user = User::where('name', $name)->first();
            $invoices = $user->invoices()->get();
            return view('auth.normal_user.user_home', compact('name', 'invoices'));
        } 
        else {
            return redirect()->back()->with('error', 'You are not authorized to view that page.');
        }    
    }


    //view all allocated invoices to all users
    public function taskView() {
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }

        $dataArray = [];
        $users = User::where('is_admin', 0)->get();     

        foreach($users as $user){
            $ivarray = [];
            $invoices = $user->invoices()->get();

            foreach($invoices as $invoice){
                $ivarray[] = $invoice->invoice_number;
            }
            if (empty($ivarray)) {
                continue;
            }

            $dataArray[$user->name] = $ivarray;
        }   
        return view('auth.admin.readallocations', compact('dataArray'));
    }

    
    //allocating invoice to user
    public function allocate(Request $request) {
    
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }
        
        $username = $request->name;
        $invoice_no = $request->invoice_number;
    
        $user = User::where('name', $username)->first();
        $invoice = Invoice::where('invoice_number', $invoice_no)->first();
    
        $users = User::where('is_admin', 0)->get();
        $invoices = Invoice::all();
        
        $err_message = "couldn't allocate";
    
        if($user and $invoice) {
            $userId = $user->id;
            $invoiceId = $invoice->id;
            User_Invoice::createAllocation($userId, $invoiceId);
            $err_message = "allocation successfull";
        }

        return response()->json([
            "err_message" => $err_message,
        ]);
    }


    // view page for revoking invoice allocated to a user
    public function revokeAllocationView(){
        
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }  

        $users = User::where('is_admin', 0)->get();
        $invoices = Invoice::all();
        
        return view('auth.admin.deleteallocations', compact('users', 'invoices'));
    }
    

    // revoking invoice from user
    public function deallocate(Request $request) {
        
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }
        
        $user = User::where('name', $request->name)->first();
        $invoice = Invoice::where('invoice_number', $request->invoice_number)->first();
        $err_message = "invoice revoked from user";
        
        if($user && $invoice){
            User_Invoice::deleteAllocation($user->id, $invoice->id);
        }
        else{
            $err_message = 'user or invoice does not exist'; 
        }
        
        return response()->json([
            'err_message' => $err_message,
        ]);  
    }
    
    //Admin dashboard data for ajax calls 
    public function getDashData() {
        
        if (!Gate::allows('isAdmin')) {
            return redirect()->route('index');
        }
        $userCount = User::count();
        $invoiceCount = Invoice::count();
        $allocateCount = User_Invoice::count();
        $data = [
            'userCount' => $userCount,
            'invoiceCount' => $invoiceCount,
            'allocateCount' => $allocateCount,
        ];
        return response()->json($data);
    }
}
