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
        Schema::table('blogs', function (Blueprint $table) {

            $table->foreignId('naat_khawan_id')
                ->nullable()
                ->constrained('naat_khawans')
                ->cascadeOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {

            $table->dropForeign(['naat_khawan_id']);
            $table->dropColumn('naat_khawan_id');

        });
    }
};
