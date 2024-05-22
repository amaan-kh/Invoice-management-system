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
            $table->string('invoice_number')->unique();
            $table->integer('currency_type')->unsigned()->default(1);
            $table->decimal('conversion_rate', 5, 2)->default(0);
            $table->date('period_from')->nullable()->default(now());
            $table->date('period_to')->nullable()->default(now());
            $table->date('invoice_date')->default(now());
            $table->string('invoice_type')->nullable();
            $table->string('bill_to_company_name')->nullable();
            $table->string('bill_to_company_address')->nullable();
            $table->string('bill_to_company_gstin')->nullable();
            $table->integer('company_tax_number_id')->unsigned()->default();
            $table->text('address')->nullable();
            $table->string('gstin')->nullable();
            $table->text('description')->nullable();
            $table->decimal('taxable_amount', 12, 2)->default(0);
            $table->set('gst_type',['cgst+sgst','igst'])->default('cgst+sgst');
            $table->decimal('tax_amount', 12, 2)->default(0);
            $table->decimal('roundup_amount', 8, 2)->default(0);
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->string('bank_name')->nullable();
            $table->string('bank_branch_name')->nullable();
            $table->string('bank_account_number')->nullable();
            $table->string('bank_ifsc_code')->nullable();
            $table->text('note')->nullable();
            $table->set('status',['active','pending','cancelled'])->default('pending');
            $table->string('transactionId')->nullable();
            $table->foreignId('created_by')->unsigned()->default(1)->constrained('users');
            $table->integer('updated_by')->unsigned()->nullable();
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
