<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('entertainment_downloads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('entertainment_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('entertainment_type', 191)->nullable();
            $table->boolean('is_download')->default(0);
            $table->string('type', 191)->nullable();
            $table->string('quality', 191)->nullable();
            $table->string('device_id', 191)->nullable();
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
        Schema::dropIfExists('entertainment_downloads');
    }
};
