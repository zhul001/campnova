<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_is_active_to_tryouts_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tryouts', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('tryouts', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
};