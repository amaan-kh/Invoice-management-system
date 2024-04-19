<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Invoice extends Model
{
    use HasFactory;

    public static function createAllocation($userId, $invoiceId) {

        $existsAlready = User_Invoice::where('user_id', $userId)->where('invoice_id', $invoiceId)->first();



        if(!$existsAlready){
            $usIv = new User_Invoice;
            $usIv->user_id = $userId;
            $usIv->invoice_id = $invoiceId;
            $usIv->save();
        }
        
    }
}
