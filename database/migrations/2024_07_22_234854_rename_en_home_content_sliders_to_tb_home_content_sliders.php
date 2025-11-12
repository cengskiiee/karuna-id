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
        
        Schema::rename('en_home_content_sliders', 'tb_home_content_sliders');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::rename('tb_home_content_sliders', 'en_home_content_sliders');
    }
};
