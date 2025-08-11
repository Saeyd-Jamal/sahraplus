<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('shorts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 200);
            $table->text('description')->nullable();
            $table->string('video_path', 191);
            $table->string('poster_path', 191)->nullable();
            $table->enum('aspect_ratio', ["vertical", "horizontal"])->default('vertical');
            $table->unsignedBigInteger('likes_count')->default(0);
            $table->unsignedBigInteger('comments_count')->default(0);
            $table->unsignedBigInteger('shares_count')->default(0);
            $table->string('share_url', 191)->nullable();
            $table->boolean('is_featured')->default(0);
            $table->enum('status', ["active", "inactive"])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shorts');
    }
};
