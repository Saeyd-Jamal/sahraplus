<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_ar', 191);
            $table->string('title_en', 191);
            $table->string('title_el', 191);
            $table->string('title_fr', 191);
            $table->string('title_de', 191);
            $table->enum('type', ["movie", "tvshow"]);
            $table->integer('position')->default(0);
            $table->integer('status')->default(1);
            $table->string('numbering', 191);
            $table->boolean('is_restricted')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_sliders');
    }
};
