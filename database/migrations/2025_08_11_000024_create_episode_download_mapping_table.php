<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('episode_download_mapping', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('episode_id')->nullable();
            $table->string('type', 191)->nullable();
            $table->string('quality', 191)->nullable();
            $table->text('url')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('episode_download_mapping');
    }
};
