<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191)->nullable();
            $table->text('poster_url')->nullable();
            $table->unsignedBigInteger('entertainment_id')->nullable();
            $table->unsignedBigInteger('season_id')->nullable();
            $table->string('trailer_url_type', 191)->nullable();
            $table->text('trailer_url')->nullable();
            $table->string('access', 191)->nullable();
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->string('IMDb_rating', 191)->nullable();
            $table->longText('content_rating')->nullable();
            $table->string('duration', 191)->nullable();
            $table->date('release_date')->nullable();
            $table->boolean('is_restricted')->default(0);
            $table->longText('short_desc')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('enable_quality')->default(0);
            $table->string('video_upload_type', 191)->nullable();
            $table->text('video_url_input')->nullable();
            $table->boolean('download_status')->default(0);
            $table->string('download_type', 191)->nullable();
            $table->text('download_url')->nullable();
            $table->boolean('enable_download_quality')->default(0);
            $table->boolean('status')->default(0);
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->text('video_quality_url')->nullable();
            $table->string('tmdb_id', 191)->nullable();
            $table->string('tmdb_season', 191)->nullable();
            $table->string('episode_number', 191)->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->text('poster_tv_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
