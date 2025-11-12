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
        //
        Schema::table('tb_home_content_sliders', function (Blueprint $table) {
            $table->renameColumn('title', 'en_title');
            $table->renameColumn('description', 'en_description');
        });

        Schema::table('tb_home_content_sliders', function (Blueprint $table) {
            $table->string('id_title')->after('en_description');
            $table->string('id_description')->after('en_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('tb_home_content_sliders', function (Blueprint $table) {
            $table->renameColumn('en_title', 'title');
            $table->renameColumn('en_description', 'description');
        });

        Schema::table('tb_home_content_sliders', function (Blueprint $table) {
            $table->dropColumn('id_title');
            $table->dropColumn('id_description');
        });
    }
};
