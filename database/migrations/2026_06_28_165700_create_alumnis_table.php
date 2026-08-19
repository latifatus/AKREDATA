<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim')->unique();
            $table->string('prodi')->nullable();
            $table->year('tahun_lulus');
            $table->string('ts')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('instansi')->nullable();

            $table->string('sumber_rekognisi')->nullable();
            $table->text('jenis_pengakuan')->nullable();
            $table->string('link_bukti')->nullable();
            $table->year('tahun_bekerja')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
