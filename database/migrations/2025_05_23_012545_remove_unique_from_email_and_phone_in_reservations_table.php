<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            // 正しい形式：カラム配列で指定する
            // $table->dropUnique(['email']);
            // $table->dropUnique(['phone']);
        });
    }

    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->unique('email');
            $table->unique('phone');
        });
    }
};
