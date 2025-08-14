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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string('login_type')->nullable();
            $table->text('file_url')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('is_banned')->default(0);
            $table->integer('is_subscribe')->default(0);
            $table->integer('status')->default(1);
            $table->timestamp('last_notification_seen')->nullable();
            $table->longText('address')->nullable();
            $table->string('user_type')->nullable();
            $table->integer('pin')->nullable();
            $table->integer('otp')->nullable();
            $table->boolean('is_parental_lock_enable')->default(0);
            $table->softDeletes();
            $table->rememberToken();
            $table->string('father_code')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamp('last_activity')->nullable();
            $table->boolean('super_admin')->default(0);
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
