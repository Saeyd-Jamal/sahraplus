<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model_type', 191);
            $table->unsignedBigInteger('model_id');
            $table->string('uuid', 36)->nullable();
            $table->string('collection_name', 191);
            $table->string('name', 191);
            $table->string('file_name', 191);
            $table->string('mime_type', 191)->nullable();
            $table->string('disk', 191);
            $table->string('conversions_disk', 191)->nullable();
            $table->unsignedBigInteger('size');
            $table->longText('manipulations');
            $table->longText('custom_properties');
            $table->longText('generated_conversions');
            $table->longText('responsive_images');
            $table->unsignedInteger('order_column')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
