<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_ruangan',
        'unit_satuan_kerja_id',
    ];

    public function unitSatuanKerja()
    {
        return $this->belongsTo(UnitSatuanKerja::class, 'unit_satuan_kerja_id');
    }

    public function barangs()
    {
        return $this->hasMany(Barang::class, 'ruangan_id');
    }
}
