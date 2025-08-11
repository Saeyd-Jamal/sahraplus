<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('migrations', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->string('migration', 191);
            $table->integer('batch');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('migrations');
    }
};
