<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'kantor',
        'email_kantor',
        'no_kode_lokasi',
        'alamat_kantor',
        'kepala_dinas_pejabat_1',
        'jabatan_pejabat_1',
        'nip_pejabat_1',
        'kepala_dinas_pejabat_2',
        'jabatan_pejabat_2',
        'nip_pejabat_2'
    ];

    public function unitSatuanKerjas()
    {
        return $this->hasMany(UnitSatuanKerja::class, 'unit_id');
    }
}
