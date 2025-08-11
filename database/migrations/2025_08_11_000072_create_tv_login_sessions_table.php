<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tv_login_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('session_id', 36);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('expires_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tv_login_sessions');
    }
};
