<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_reminder', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('entertainment_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('profile_id')->nullable();
            $table->date('release_date')->nullable();
            $table->boolean('is_remind')->default(0);
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_reminder');
    }
};
