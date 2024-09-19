<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Unit;
use App\Models\Ruangan;
use App\Models\UnitSatuanKerja;

class LabelController extends Controller
{
    public function index($id){
        $barang = Barang::findOrFail($id);
        $ruangan = Ruangan::where('id', $barang->ruangan_id)->first();
        $satuanKerja = UnitSatuanKerja::where('id', $ruangan->unit_satuan_kerja_id)->first();
        $unit = Unit::where('id', $satuanKerja->unit_id)->first();
        return view ('barangs.label', compact('barang', 'unit'));
    }

    public function printLabel($id)
    {
        $barang = Barang::findOrFail($id);
        $ruangan = Ruangan::where('id', $barang->ruangan_id)->first();
        $satuanKerja = UnitSatuanKerja::where('id', $ruangan->unit_satuan_kerja_id)->first();
        $unit = Unit::where('id', $satuanKerja->unit_id)->first();
        return view('barangs.print-label', compact('barang', 'unit'));
    }
    
}
