<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('currency_name', 191);
            $table->string('currency_symbol', 191)->nullable();
            $table->string('currency_code', 191);
            $table->boolean('is_primary')->default(0);
            $table->enum('currency_position', ["left", "right", "left_with_space", "right_with_space"])->default('left');
            $table->unsignedInteger('no_of_decimal');
            $table->string('thousand_separator', 191)->nullable();
            $table->string('decimal_separator', 191)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
