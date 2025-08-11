<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('continue_watch', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('entertainment_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('profile_id')->nullable();
            $table->string('entertainment_type', 191)->nullable();
            $table->string('watched_time', 191)->nullable();
            $table->string('total_watched_time', 191)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedBigInteger('episode_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('continue_watch');
    }
};
