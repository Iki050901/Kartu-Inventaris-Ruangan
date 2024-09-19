<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // protected $table = 'pegawais';

    protected $fillable = [
        'jabatan',
        'user_id',
        'unit_id',
    ];

    // Relasi ke tabel User (one-to-one)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel Unit (many-to-one)
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
