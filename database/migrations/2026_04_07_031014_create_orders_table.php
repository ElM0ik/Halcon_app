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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number', 60)->unique();
            $table->string('customer_name', 200);
            $table->string('customer_code', 60);
            $table->text('tax_information')->nullable();
            $table->text('delivery_address')->nullable();
            $table->text('additional_notes')->nullable();
            $table->string('current_status', 30)->default('Ordered');
            $table->boolean('is_archived')->default(false);
            $table->foreignId('created_by')->nullable()->constrained('employees')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
