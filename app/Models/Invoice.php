<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public static function createInvoice($title, $description)             
    {    
        $invoice = new Invoice;
        $invoice->title = $title;
        $invoice->description = $description;
        $invoice->save();
    }

    public static function getInvoices() 
    {
        $invoices = Invoice::all();
        return $invoices;
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
