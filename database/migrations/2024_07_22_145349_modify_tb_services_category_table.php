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
        Schema::table('tb_services_category', function (Blueprint $table) {
            // change column name
            $table->renameColumn('service_category_title', 'en_service_category_title');
            $table->renameColumn('description', 'en_description');

            //new column for id
           $table->string('id_service_category_title');
           $table->string('id_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        // Mengembalikan perubahan
        Schema::table('tb_services_category', function (Blueprint $table) {
            // Ganti nama kolom kembali
            $table->renameColumn('en_service_category_title', 'service_category_title');
            $table->renameColumn('en_description', 'description');

            // Hapus kolom baru
            $table->dropColumn(['id_service_category_title', 'id_description']);
        });
    }
};
