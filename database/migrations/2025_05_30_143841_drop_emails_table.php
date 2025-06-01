<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('emails');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->string('to_email');
            $table->string('message_id');
            $table->string('subject');
            $table->text('body');
            $table->string('from_email'); // 例
            $table->timestamps();
        });
    }
};
