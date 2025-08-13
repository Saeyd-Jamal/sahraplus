<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 191)->nullable();
            $table->string('first_name', 191)->nullable();
            $table->string('last_name', 191)->nullable();
            $table->string('email', 191);
            $table->string('mobile', 191)->nullable();
            $table->string('login_type', 191)->nullable();
            $table->text('file_url')->nullable();
            $table->string('gender', 191)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 191);
            $table->integer('is_banned')->default(0);
            $table->integer('is_subscribe')->default(0);
            $table->integer('status')->default(1);
            $table->timestamp('last_notification_seen')->nullable();
            $table->longText('address')->nullable();
            $table->string('user_type', 191)->nullable();
            $table->integer('pin')->nullable();
            $table->integer('otp')->nullable();
            $table->boolean('is_parental_lock_enable')->default(0);
            $table->string('remember_token', 100)->nullable();
            $table->softDeletes();
            $table->string('father_code', 191)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
