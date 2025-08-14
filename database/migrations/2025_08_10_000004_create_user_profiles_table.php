<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('about_self', 191)->nullable();
            $table->string('expert', 191)->nullable();
            $table->string('facebook_link', 191)->nullable();
            $table->string('instagram_link', 191)->nullable();
            $table->string('twitter_link', 191)->nullable();
            $table->string('dribbble_link', 191)->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
