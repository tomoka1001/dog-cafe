<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            // $table->dropColumn('reserved_at');

            // ここでnullable()をつけることで既存データにも対応
            $table->date('reserved_date')->nullable()->after('phone');
            $table->time('reserved_time')->nullable()->after('reserved_date');
        });
    }

    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn(['reserved_date', 'reserved_time']);
            $table->dateTime('reserved_at')->after('phone');
        });
    }
};
