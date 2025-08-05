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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name')->nullable();
            $table->string('cnic')->unique();
            $table->date('date_of_birth');
            $table->string('contact_information')->nullable(); // e.g., phone number or email
            $table->string('address')->nullable();
            $table->string('gender')->nullable(); // e.g., 'male', 'female', 'other'
            $table->string('blood_group')->nullable(); // e.g., 'A+', 'B-', etc.
            $table->date('registration_date')->default(now()); // Date when the patient was registered
            $table->string('medical_history')->nullable(); // Brief medical history of the patient
            $table->string('allergies')->nullable(); // Any known allergies
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
