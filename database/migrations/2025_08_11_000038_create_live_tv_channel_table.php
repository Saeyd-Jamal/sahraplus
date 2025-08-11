<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('live_tv_channel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191)->nullable();
            $table->text('poster_url')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->text('thumb_url')->nullable();
            $table->string('access', 191)->nullable();
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->text('poster_tv_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('live_tv_channel');
    }
};
