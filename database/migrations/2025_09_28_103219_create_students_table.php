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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('studentNumber', 9)->unique();     // Unique student ID
            $table->string('lname', 150);                     // Last name
            $table->string('fname', 150);                     // First name
            $table->string('mi', 2)->nullable();              // Middle initial (optional)
            $table->string('email', 150)->unique();           // Email (unique)
            $table->string('contactNumber', 20)->nullable();  // Contact number (optional)
            $table->timestamps();                             // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};