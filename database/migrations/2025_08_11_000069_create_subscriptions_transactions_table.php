<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('subscriptions_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subscriptions_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->double('amount', 8, 2)->nullable();
            $table->string('payment_type', 191)->nullable();
            $table->string('payment_status', 191)->nullable();
            $table->string('transaction_id', 191)->nullable();
            $table->text('tax_data')->nullable();
            $table->text('other_transactions_details')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions_transactions');
    }
};
