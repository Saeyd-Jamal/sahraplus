<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notification_template_content_mapping', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->unsignedBigInteger('template_id')->nullable();
            $table->string('language', 191)->nullable();
            $table->longText('template_detail')->nullable();
            $table->string('subject', 191)->nullable();
            $table->string('notification_message', 191)->nullable();
            $table->string('notification_link', 191)->nullable();
            $table->integer('status')->default(0);
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notification_template_content_mapping');
    }
};
