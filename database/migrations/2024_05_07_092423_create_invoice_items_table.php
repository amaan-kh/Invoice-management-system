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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->onDelete('cascade');
            $table->string('asset_tag')->nullable();
            $table->string('part_number')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('hsn_code')->nullable();
            $table->string('sac_code')->nullable();
            $table->text('description')->nullable();
            $table->integer('gst_percent')->nullable();
            $table->decimal('taxable_amount', 12, 2)->default(0);
            $table->decimal('cgst', 4, 2)->default(0);
            $table->decimal('sgst', 4, 2)->default(0);
            $table->decimal('igst', 4, 2)->default(0);
            $table->decimal('tax_amount', 12, 2)->default(0);
            $table->decimal('total_amount', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
