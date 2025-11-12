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
        Schema::rename('en_faq', 'tb_faq');

        Schema::table('tb_faq', function (Blueprint $table) {
            // change column name
            $table->renameColumn('faq_question', 'en_faq_question');
            $table->renameColumn('faq_answer', 'en_faq_answer');

            //new column for id
            $table->string('id_faq_question');
            $table->string('id_faq_answer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Balik perubahan
        Schema::table('tb_faq', function (Blueprint $table) {
            $table->renameColumn('en_faq_question', 'faq_question');
            $table->renameColumn('en_faq_answer', 'faq_answer');

            $table->dropColumn(['id_faq_question', 'id_faq_answer']);
        });

        Schema::rename('tb_faq', 'en_faq');
    }
};
