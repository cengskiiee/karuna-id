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
        Schema::create('tb_about_years_experience', function (Blueprint $table) {
            $table->integer('years_experience');
            $table->integer('projects_completed');
            $table->integer('satisfied_client');
            $table->integer('total_rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_about_years_experience');
    }
};
