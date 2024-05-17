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

    //auth and routing to admin/user views
    public function login(Request $request){

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

            return redirect()->intended(route('user.home', ['name' => $request->name]));

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

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // public function allocateView($id) {
    //     if (!Gate::allows('isAdmin')) {
    //         // abort(403, 'Unauthorized');
    //         return redirect()->route('index');
    //     }
    //     $users = User::where('is_admin', 0)->get();
    //     $invoices = Invoice::all();
    //     return view('auth.admin.allocate_invoice', compact('users', 'invoices'));
    // }

    public function allocateView($id) {
        if (!Gate::allows('isAdmin')) {
            // abort(403, 'Unauthorized');
            return redirect()->route('index');
        }
        $users = User::where('is_admin', 0)->get();
        $invoice = Invoice::where('invoice_number', $id)->first();
        if (is_null($users) || is_null($invoice)) {
            return redirect()->back()->with('error_message', 'Invoice or user not found.');
        }

        return view('auth.admin.allocate_invoice', compact('users', 'invoice'));
    }


    public function getDash(){
       if (!Gate::allows('isAdmin')) {
            // abort(403, 'Unauthorized');
        return redirect()->back()->with('error', 'You are not authorized to view that page.');
        //return redirect()->route('index');
    }
    $userCount = User::count();
    $invoiceCount = Invoice::count();
    $allocateCount = User_Invoice::count();
    // return view('auth.admin.admin_panel');
     return view('auth.admin.admin_panel', compact('userCount', 'invoiceCount', 'allocateCount'));
}

public function getUserDash($name){
    //TODO: add protection here
    if (Gate::allows('isUserName', $name)) {
        $user = User::where('name', $name)->first();
        $invoices = $user->invoices()->get();
        return view('auth.normal_user.user_home', compact('name', 'invoices'));
    } else {
            // Unauthorized action
        return redirect()->back()->with('error', 'You are not authorized to view that page.');
        // return redirect()->route('index');
             //abort(403); // Or handle the unauthorized access in another way
    }
    
}

public function taskView() {
   if (!Gate::allows('isAdmin')) {
            // abort(403, 'Unauthorized');
    return redirect()->route('index');
}
$dataArray = [];
[$users] = User::getAllocatedUsers();

foreach($users as $user){
    $ivarray = [];
    $invoices = $user->invoices()->get();
            // \Log::info(json_encode($invoices));
    foreach($invoices as $invoice){
        $ivarray[] = $invoice->invoice_number;
        
    }
    if (empty($ivarray)) {
        continue;
    }
    
    $dataArray[$user->name] = $ivarray;
}

        //\Log::info(json_encode($dataArray));

return view('auth.admin.readallocations', compact('dataArray'));
}

public function allocate(Request $request) {
        //--------------------------------------    
    if (!Gate::allows('isAdmin')) {
            // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }
    
    $username = $request->name;
    $invoice_no = $request->invoice_number;

    $user = User::where('name', $username)->first();
    $invoice = Invoice::where('invoice_number', $invoice_no)->first();

    $users = User::where('is_admin', 0)->get();
    $invoices = Invoice::all();
    
    if($user and $invoice) {
        $userId = $user->id;
        $invoiceId = $invoice->id;
        User_Invoice::createAllocation($userId, $invoiceId);
    }
    else{
        
        $err_message = 'user or invoice does not exist'; 
        session()->flash('err_message', $err_message);
        return redirect()->back()->with('err_message', $err_message);
    }
    

    $err_message = "allocation successfull";
    session()->flash('err_message', $err_message);
    return redirect()->back()->with('err_message', 'Allocation was successfull');

}
public function revokeAllocationView(){
   if (!Gate::allows('isAdmin')) {
            // abort(403, 'Unauthorized');
    return redirect()->route('index');
}
$users = User::where('is_admin', 0)->get();
$invoices = Invoice::all();
return view('auth.admin.deleteallocations', compact('users', 'invoices'));
}

public function deallocate(Request $request) {
    if (!Gate::allows('isAdmin')) {
            // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }
    $users = User::where('is_admin', 0)->get();
    $invoices = Invoice::all();
    $user = User::where('name', $request->name)->first();
    $invoice = Invoice::where('invoice_number', $request->invoice_number)->first();
    $err_message = "invoice revoked from user";
    if($user && $invoice){
        User_Invoice::deleteAllocation($user->id, $invoice->id);
    }
    else{
        $err_message = 'user or invoice does not exist'; 
    }
    session()->flash('err_message', $err_message);
    session()->flash('users', $users);
    session()->flash('invoices', $invoices);
// Redirect back with flash data
    return response()->json([
        'err_message' => $err_message,
    ]);
    
}

public function getDashData() {
    if (!Gate::allows('isAdmin')) {
            // abort(403, 'Unauthorized');
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

    return compact('userCount', 'invoiceCount', 'allocateCount');

}
}
