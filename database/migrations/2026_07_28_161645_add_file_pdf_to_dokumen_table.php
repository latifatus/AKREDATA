<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dokumen', function (Blueprint $table) {
            $table->string('file_pdf')->nullable()->after('file');
        });
    }

    public function down(): void
    {
        Schema::table('dokumen', function (Blueprint $table) {
            $table->dropColumn('file_pdf');
        });
    }
};