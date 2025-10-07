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
        Schema::create('rumahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('subNama');
            $table->bigInteger('harga');
            $table->string('label')->default('Tersedia');
            $table->longText('deskripsi');
            $table->integer('luas');
            $table->integer('kamarTidur');
            $table->integer('kamarMandi');
            $table->integer('garasi');
            $table->string('video')->nullable();
            $table->string('foto')->nullable();
            $table->string('deskripsiLanjutan')->nullable();
            $table->string('fotoDenah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rumahs');
    }
};
