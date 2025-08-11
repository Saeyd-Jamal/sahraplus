<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('plan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191);
            $table->string('identifier', 191);
            $table->string('android_identifier', 191)->nullable();
            $table->string('apple_identifier', 191)->nullable();
            $table->double('price', 8, 2)->nullable();
            $table->boolean('discount')->default(0);
            $table->double('discount_percentage', 8, 2)->nullable();
            $table->double('total_price', 8, 2)->nullable();
            $table->bigInteger('level')->default(0);
            $table->string('duration', 191)->nullable();
            $table->bigInteger('duration_value')->default(1);
            $table->boolean('status')->default(1);
            $table->text('description')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plan');
    }
};
