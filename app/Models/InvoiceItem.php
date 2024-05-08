<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

     protected $fillable = [
    'invoice_id',
        'asset_tag',
        'part_number',
        'serial_number',
        'hsn_code',
        'sac_code',
        'description',
        'gst_percent',
        'taxable_amount',
        'cgst',
        'sgst',
        'igst',
        'tax_amount',
        'total_amount',
];
    public function invoice()
{
    return $this->belongsTo(Invoice::class);
}

}
