<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address_line_1', 191);
            $table->string('address_line_2', 191)->nullable();
            $table->string('postal_code', 191)->nullable();
            $table->string('city', 191);
            $table->string('state', 191);
            $table->string('country', 191);
            $table->double('latitude', 8, 2)->default(1);
            $table->double('longitude', 8, 2)->default(1);
            $table->boolean('is_primary')->default(0);
            $table->string('addressable_type', 191);
            $table->unsignedBigInteger('addressable_id');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
