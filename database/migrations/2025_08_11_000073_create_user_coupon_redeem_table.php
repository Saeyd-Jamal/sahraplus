<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_coupon_redeem', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('coupon_code', 191);
            $table->double('discount', 8, 2);
            $table->integer('user_id');
            $table->integer('coupon_id');
            $table->integer('booking_id');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_coupon_redeem');
    }
};
