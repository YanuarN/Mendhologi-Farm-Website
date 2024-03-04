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
        Schema::create('hewans', function (Blueprint $table) {
            $table->id('idHewan');
            $table->foreignId('idAdmin')->constrained('admins')->references('idAdmin');
            $table->foreignId('idKategori')->constrained('kategoris')->references('idKategori');
            $table->string('foto');
            $table->string('jenis');
            $table->integer('berat');
            $table->double('harga');
            $table->boolean('isReady')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hewans');
    }
};
