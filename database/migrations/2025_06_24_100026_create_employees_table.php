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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('middle_name', 50)->nullable();
            $table->string('last_name', 50);
            $table->string('email', 100)->unique();
            $table->string('phone_number', 20)->unique();
            $table->date('dob');
            $table->tinyInteger('gender');
            $table->string('address', 100);
            $table->string('emergency_contact_name', 50)->nullable();
            $table->string('emergency_contact_number', 20)->nullable();
            $table->date('joining_date');
            $table->string('job_title', 100);
            $table->tinyInteger('employee_type');
            $table->string('offer_letter', 100)->nullable();
            $table->foreignId('department_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('role_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
