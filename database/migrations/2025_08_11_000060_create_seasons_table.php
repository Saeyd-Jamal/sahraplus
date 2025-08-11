<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tmdb_id', 191)->nullable();
            $table->string('season_index', 191)->nullable();
            $table->string('name', 191)->nullable();
            $table->text('poster_url')->nullable();
            $table->unsignedBigInteger('entertainment_id')->nullable();
            $table->string('trailer_url_type', 191)->nullable();
            $table->text('trailer_url')->nullable();
            $table->string('access', 191)->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->longText('short_desc')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('seasons');
    }
};
