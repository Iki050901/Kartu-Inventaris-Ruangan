<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitSatuanKerja;
use App\Models\Barang;
use App\Models\Ruangan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Menampilkan daftar barang
    public function index(Request $request)
    {
        $user = auth()->user();
    
        // Mendapatkan data pegawai yang terhubung dengan user yang login
        $pegawai = Pegawai::where('user_id', $user->id)->first();
    
        // Mendapatkan ID unit satuan kerja terkait pegawai
        $unitSatuanKerjaId = $pegawai->unit_satuan_kerja_id;
    
        // Mendapatkan parameter pencarian
        $search = $request->get('search');
        $rows = $request->get('rows', 10); // Default 10 baris per halaman
        $ruangan_id = $request->get('ruangan_id');
        $keadaan_barang = $request->get('keadaan_barang'); // Untuk filter kondisi
    
        // Query untuk mendapatkan data barang yang terkait dengan unit user
        $barangsQuery = Barang::with('ruangan')
            ->whereHas('ruangan.unitSatuanKerja', function ($query) use ($unitSatuanKerjaId) {
                $query->where('id', $unitSatuanKerjaId);
            })
            ->when($search, function($query, $search) {
                return $query->where('jenis_nama_barang', 'like', "%{$search}%");
            })
            ->when($ruangan_id, function($query, $ruangan_id) {
                return $query->where('ruangan_id', $ruangan_id);
            })
            ->when($keadaan_barang, function($query, $keadaan_barang) {
                return $query->where('keadaan_barang', $keadaan_barang);
            });
    
        // Paginate data
        $barangs = $barangsQuery->paginate($rows);
    
        // Ambil daftar ruangan untuk dropdown
        $ruangans = Ruangan::where('unit_satuan_kerja_id', $unitSatuanKerjaId)->get();
    
        // Hitung jumlah barang untuk card dashboard
        $totalBarang = Barang::whereHas('ruangan.unitSatuanKerja', function ($query) use ($unitSatuanKerjaId) {
            $query->where('id', $unitSatuanKerjaId);
        })->count();
    
        $jumlahBaik = Barang::where('keadaan_barang', 'Baik')
            ->whereHas('ruangan.unitSatuanKerja', function ($query) use ($unitSatuanKerjaId) {
                $query->where('id', $unitSatuanKerjaId);
            })->count();
    
        $jumlahKurangBaik = Barang::where('keadaan_barang', 'Kurang Baik')
            ->whereHas('ruangan.unitSatuanKerja', function ($query) use ($unitSatuanKerjaId) {
                $query->where('id', $unitSatuanKerjaId);
            })->count();
    
        $jumlahBuruk = Barang::where('keadaan_barang', 'Buruk')
            ->whereHas('ruangan.unitSatuanKerja', function ($query) use ($unitSatuanKerjaId) {
                $query->where('id', $unitSatuanKerjaId);
            })->count();
    
        // Kembalikan data ke view
        return view('barangs.index', compact(
            'barangs', 
            'ruangans', 
            'rows', 
            'ruangan_id', 
            'keadaan_barang', 
            'totalBarang', 
            'jumlahBaik', 
            'jumlahKurangBaik', 
            'jumlahBuruk'
        ));
    }    

    // Menampilkan form untuk menambahkan barang
    public function create()
    {
        $ruangans = Ruangan::all();
        $user = auth()->user();
        $pegawai = Pegawai::where('user_id', $user->id)->first();
        $unitSatuanKerja = UnitSatuanKerja::where('id', $pegawai->unit_satuan_kerja_id)->first();
        $unit = Unit::where('id', $unitSatuanKerja->unit_id)->first();
        return view('barangs.create', compact('ruangans', 'unitSatuanKerja', 'unit'));
    }

    // Menyimpan data barang baru
    public function store(Request $request)
    {
        $request->validate([
            'jenis_nama_barang' => 'required|string|max:255',
            'merk_model' => 'required|string|max:255',
            'no_seri_pabrik' => 'required|string|max:255',
            'ukuran' => 'nullable|string|max:255',
            'bahan' => 'nullable|string|max:255',
            'tahun_pembuatan_pembelian' => 'required|integer',
            'no_kode_barang' => 'required|string|max:255',
            'jumlah_barang' => 'required|string|max:255',
            'harga_beli' => 'required|integer',
            'keadaan_barang' => 'required|string|in:baik,kurang_baik,rusak',
            'keterangan_mutase' => 'nullable|string',
            'ruangan_id' => 'required|exists:ruangans,id',
            'tanggal_pencatatan' => 'required|date',
        ]);

        Barang::create($request->all());

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Menampilkan detail barang
    public function show($id)
    {
        $user = auth()->user();
        $pegawai = Pegawai::where('user_id', $user->id)->first();
        $unitSatuanKerja = UnitSatuanKerja::where('id', $pegawai->unit_satuan_kerja_id)->first();
        $unit = Unit::where('id', $unitSatuanKerja->unit_id)->first();
        $barang = Barang::with(['ruangan'])->findOrFail($id);
        return view('barangs.show', compact('barang', 'unitSatuanKerja', 'unit'));
    }

    // Menampilkan form untuk mengedit barang
    public function edit($id)
    {
        $user = auth()->user();
        $pegawai = Pegawai::where('user_id', $user->id)->first();
        $unitSatuanKerja = UnitSatuanKerja::where('id', $pegawai->unit_satuan_kerja_id)->first();
        $unit = Unit::where('id', $unitSatuanKerja->unit_id)->first();
        $barang = Barang::findOrFail($id);
        $ruangans = Ruangan::all();
        return view('barangs.edit', compact('barang', 'ruangans', 'unit', 'unitSatuanKerja'));
    }

    // Memperbarui data barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_nama_barang' => 'required|string|max:255',
            'merk_model' => 'required|string|max:255',
            'no_seri_pabrik' => 'required|string|max:255',
            'ukuran' => 'nullable|string|max:255',
            'bahan' => 'nullable|string|max:255',
            'tahun_pembuatan_pembelian' => 'required|integer',
            'no_kode_barang' => 'required|string|max:255',
            'jumlah_barang' => 'required|string|max:255',
            'harga_beli' => 'required|integer',
            'keadaan_barang' => 'required|string|in:baik,kurang_baik,rusak',
            'keterangan_mutase' => 'nullable|string',
            'ruangan_id' => 'required|exists:ruangans,id',
            'tanggal_pencatatan' => 'required|date',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil diperbarui.');
    }

    // Menghapus barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus.');
    }
}
