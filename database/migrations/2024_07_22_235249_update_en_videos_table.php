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
        Schema::rename('en_videos', 'tb_videos');

        Schema::table('tb_videos', function (Blueprint $table) {
            $table->renameColumn('title', 'en_title');
        });

        Schema::table('tb_videos', function (Blueprint $table) {
            $table->integer('id_title')->after('en_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('tb_videos', 'en_videos');

        Schema::table('en_videos', function (Blueprint $table) {
            $table->renameColumn('en_title', 'title');
        });

        Schema::table('en_videos', function (Blueprint $table) {
            $table->dropColumn('id_title');
        });
    }
};
