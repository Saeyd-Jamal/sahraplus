<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('slider_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('home_slider_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('position')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('slider_items');
    }
};
