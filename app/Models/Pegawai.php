<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'jabatan', 
        'unit_satuan_kerja_id',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Unit Satuan Kerja
    public function unitSatuanKerja()
    {
        return $this->belongsTo(UnitSatuanKerja::class, 'unit_satuan_kerja_id');
    }
}
