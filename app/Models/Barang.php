<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_nama_barang',
        'merk_model',
        'no_seri_pabrik',
        'ukuran',
        'bahan',
        'tahun_pembuatan_pembelian',
        'no_kode_barang',
        'jumlah_barang',
        'harga_beli',
        'keadaan_barang',
        'keterangan_mutasi',
        'ruangan_id',
        'tanggal_pencatatan',
    ];

    // Relasi ke Ruangan (many-to-one)
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }

    // Relasi ke Unit Satuan Kerja melalui Ruangan (many-to-one)
    public function unitSatuanKerja()
    {
        return $this->ruangan->unitSatuanKerja();
    }
}
