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
        Schema::create('en_contact', function (Blueprint $table) {
            $table->string('city');
            $table->string('address');
            $table->text('location_detail');
            $table->string('email');
            $table->string('contact_number');
            $table->string('instagram');
            $table->string('linkedin');
            $table->string('facebook');
            $table->string('youtube');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('en_contact');
    }
};
