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
        Schema::create('tb_services', function (Blueprint $table) {
            $table->id(); // ID primary key otomatis

            // Kolom-kolom yang Anda butuhkan
            $table->string('id_title', 355);
            $table->string('en_title', 355);
            $table->text('id_description');
            $table->text('en_description');
            $table->string('image', 355)->nullable(); // Gambar bisa null
            $table->string('link_video', 355)->nullable(); // Video bisa null

            // Foreign key ke tb_services_category
            $table->unsignedBigInteger('service_category_id');
            $table->foreign('service_category_id')->references('id')->on('tb_services_category')->onDelete('cascade');

            // Timestamp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_services');
    }
};
