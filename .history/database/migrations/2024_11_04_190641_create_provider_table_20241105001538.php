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
        Schema::create('provider', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('profile_picture')->nullable();
            $table->string('address')->nullable();
            $table->string('nationality')->nullable();
            $table->string('specialization');
            $table->string('sub_specialization')->nullable();
            $table->integer('experience_years')->nullable();
            $table->string('qualifications')->nullable();
            $table->string('license_number')->nullable()->unique();
            $table->string('license_authority')->nullable();
            $table->date('license_expiry')->nullable();
            $table->text('bio')->nullable();
            $table->json('consultation_days')->nullable(); // Array of days
            $table->json('consultation_hours')->nullable(); // Time slots
            $table->string('time_zone')->nullable();
            $table->integer('max_consultations_per_day')->nullable();
            $table->decimal('consultation_fee', 8, 2)->nullable();
            $table->enum('consultation_type', ['video', 'audio', 'chat', 'in-person'])->default('video');
            $table->integer('consultation_duration')->default(30); // in minutes
            $table->enum('status', ['active', 'inactive', 'pending'])->default('pending');
            $table->boolean('is_verified')->default(false);
            $table->dateTime('registered_date')->nullable();
            $table->dateTime('last_login')->nullable();

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider');
    }
};
