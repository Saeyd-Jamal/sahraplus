<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('planlimitation_mapping', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('plan_id')->nullable();
            $table->integer('planlimitation_id')->nullable();
            $table->string('limitation_slug', 191)->nullable();
            $table->integer('limitation_value')->nullable();
            $table->longText('limit')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('planlimitation_mapping');
    }
};
