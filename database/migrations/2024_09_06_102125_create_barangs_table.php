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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_nama_barang');
            $table->string('merk_model');
            $table->string('no_seri_pabrik');
            $table->string('ukuran');
            $table->string('bahan');
            $table->year('tahun_pembuatan_pembelian');
            $table->string('no_kode_barang');
            $table->string('jumlah_barang');
            $table->integer('harga_beli');
            $table->string('keadaan_barang')->nullable();
            $table->text('keterangan_mutasi')->nullable();
            $table->foreignId('ruangan_id')->constrained('ruangans')->onDelete('cascade'); // dropdown relasi ke ruangan
            $table->date('tanggal_pencatatan');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
