<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitSatuanKerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_satuan_kerja',
        'nama_kepala',
        'deskripsi',
        'unit_id',
    ];

    // Relasi ke Unit (many-to-one)
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    // Relasi ke Ruangan (one-to-many)
    public function ruangans()
    {
        return $this->hasMany(Ruangan::class, 'unit_satuan_kerja_id');
    }
}
