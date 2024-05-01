<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Invoice; 
use App\Models\User_Invoice;
use Illuminate\Support\Facades\Gate;    


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

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function allocateView() {
        if (!Gate::allows('isAdmin')) {
            // abort(403, 'Unauthorized');
            return redirect()->route('index');
        }
        $users = User::where('is_admin', 0)->get();
        $invoices = Invoice::all();
        return view('auth.admin.allocate_invoice', compact('users', 'invoices'));
    }

    public function getDash(){
       if (!Gate::allows('isAdmin')) {
            // abort(403, 'Unauthorized');
        return redirect()->route('index');
    }
    return view('auth.admin.admin_panel');
}

public function getUserDash(){
    return view('auth.normal_user.user_home');
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
         // \Log::info(json_encode($request->all()));
        //--------------------------------------
    
    $username = $request->name;
    $invoice_no = $request->invoice_number;

    $user = User::where('name', $username)->first();
    $invoice = Invoice::where('invoice_number', $invoice_no)->first();

    $users = User::where('is_admin', 0)->get();
    $invoices = Invoice::all();
    
    if($user and $invoice) {
        if($user->is_admin == 1){
            $err_message = 'user is an admin, does not require allocation';
            return view('auth.admin.allocate_invoice', compact('users', 'invoices'))->with('err_message', $err_message);
        }
        $userId = $user->id;
        $invoiceId = $invoice->id;
        User_Invoice::createAllocation($userId, $invoiceId);
    }
    else{
        $err_message = 'user or invoice does not exist'; 
        return view('auth.admin.allocate_invoice', compact('users', 'invoices'))->with('err_message', $err_message);
    }
    

    $err_message = "allocation successfull";
    return view('auth.admin.allocate_invoice', compact('users', 'invoices'))->with('err_message', $err_message);

}
}
