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
        Schema::create('tb_about_how_it_work', function (Blueprint $table) {
            $table->string('id_title', 355);
            $table->string('en_title', 355);
            $table->text('id_description');
            $table->text('en_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_about_how_it_work');
    }
};
