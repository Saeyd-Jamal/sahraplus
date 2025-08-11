<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cast_crew', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 191)->nullable();
            $table->string('file_url', 191)->nullable();
            $table->string('type', 191)->nullable();
            $table->string('tmdb_id', 191)->nullable();
            $table->longText('bio')->nullable();
            $table->string('place_of_birth', 191)->nullable();
            $table->date('dob')->nullable();
            $table->string('designation', 191)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cast_crew');
    }
};
