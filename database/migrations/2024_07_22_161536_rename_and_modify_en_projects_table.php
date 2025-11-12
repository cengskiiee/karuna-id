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
        Schema::rename('en_projects', 'tb_projects');

        Schema::table('tb_projects', function (Blueprint $table) {
            // change column name
            $table->renameColumn('project_name', 'en_project_name');
            $table->renameColumn('description', 'en_description');

            //new column for id
            $table->string('id_project_name');
            $table->string('id_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_projects', function (Blueprint $table) {
            // Ganti nama kolom kembali
            $table->renameColumn('en_project_name', 'project_name');
            $table->renameColumn('en_description', 'description');

            // Hapus kolom ID
            $table->dropColumn(['id_project_name', 'id_description']);
        });

        // Ganti nama tabel kembali
        Schema::rename('tb_projects', 'en_projects');
    }
};
