<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Ruangan;
use App\Models\UnitSatuanKerja;
use App\Models\Unit;
use PDF;

class PDFController extends Controller
{
    public function cetakLabelBarang($id)
    {
        $barang = Barang::findOrFail($id);
        $ruangan = Ruangan::where('id', $barang->ruangan_id)->first();
        $satuanKerja = UnitSatuanKerja::where('id', $ruangan->unit_satuan_kerja_id)->first();
        $unit = Unit::where('id', $satuanKerja->unit_id)->first();

        $pdf = PDF::loadView('barangs.print-label', compact('barang', 'unit'))->setPaper([0, 0, 570, 400], 'landscape');

        return $pdf->download('label-barang.pdf');
    }
}
