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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('generic_name');
            $table->string('manufacturer');
            $table->string('batch_number')->unique();
            $table->date('expiry_date');
            $table->double('price'); // Price with two decimal places
            $table->integer('stock_quantity');
            $table->string('unit');
            $table->string('description')->nullable();
            $table->string('prescription_required')->default('no'); // 'yes' or
            $table->string('category')->nullable(); // e.g., 'antibiotic', 'painkiller'
            $table->string('status')->default('active'); // 'active', 'inactive', etc.
            $table->string('created_by')->nullable(); // User who created the record
            $table->string('updated_by')->nullable(); // User who last updated the record
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
