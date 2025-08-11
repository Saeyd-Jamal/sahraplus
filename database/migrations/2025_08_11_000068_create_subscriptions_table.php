<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('plan_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('status', 191)->nullable();
            $table->boolean('is_manual')->default(0);
            $table->double('amount', 8, 2)->nullable();
            $table->double('discount_percentage', 8, 2)->nullable();
            $table->double('tax_amount', 8, 2)->nullable();
            $table->double('coupon_discount', 8, 2)->nullable();
            $table->double('total_amount', 8, 2)->nullable();
            $table->string('name', 191)->nullable();
            $table->string('identifier', 191)->nullable();
            $table->string('type', 191)->nullable();
            $table->integer('duration')->nullable();
            $table->bigInteger('level')->default(0);
            $table->longText('plan_type')->nullable();
            $table->integer('payment_id')->nullable();
            $table->string('device_id', 191)->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
