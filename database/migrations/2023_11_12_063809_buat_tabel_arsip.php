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
        Schema::create('tb_arsip', function (Blueprint $table) {
            $table->string('kdSurat', 5)->primary();
            $table->string('nomorSurat', 20);
            $table->string('judulSurat', 100);
            $table->string('kategoriSurat', 5);
            $table->string('fileSurat');
            $table->dateTime('waktuPengarsipan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
