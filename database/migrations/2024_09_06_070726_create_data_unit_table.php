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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('kantor');
            $table->string('email_kantor');
            $table->string('no_kode_lokasi');
            $table->string('alamat_kantor');
            $table->string('kepala_dinas_pejabat_1');
            $table->string('jabatan_pejabat_1');
            $table->string('nip_pejabat_1');
            $table->string('kepala_dinas_pejabat_2')->nullable();
            $table->string('jabatan_pejabat_2')->nullable();
            $table->string('nip_pejabat_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
