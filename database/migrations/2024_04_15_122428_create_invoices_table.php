<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_number')->unique();
            $table->string('supplier_info');
            $table->string('customer_info');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->text('itemized_list');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('taxes', 10, 2);
            $table->decimal('total_amount_due', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
