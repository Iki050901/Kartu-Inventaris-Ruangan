<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Admin;
// use App\Models\User;
use App\Models\Ruangan;
use App\Models\UnitSatuanKerja;
use Illuminate\Http\Request;

class UnitSatuanKerjaController extends Controller
{
    // Menampilkan daftar unit satuan kerja
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = UnitSatuanKerja::query();
    
        if ($search) {
            $query->where('nama_satuan_kerja', 'LIKE', "%{$search}%");
        }
    
        $unitSatuanKerjas = $query->paginate(10);
    
        return view('unit_satuan_kerjas.index', compact('unitSatuanKerjas'));
    }
    

    // Menampilkan form untuk menambah satuan kerja baru
    public function create()
    {
        $units = Unit::all(); // Mengambil semua unit untuk dropdown
        return view('unit_satuan_kerjas.create', compact('units'));
    }

    // Menyimpan satuan kerja baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_satuan_kerja' => 'required|string|max:255',
            'nama_kepala' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'ruangans' => 'nullable|array', // Ruangan akan berbentuk array
            'ruangans.*' => 'nullable|string|max:255', // Setiap ruangan harus berupa string
        ]);
        
        // Ambil user yang sedang login
        $user = auth()->user();

        // Cari admin berdasarkan user_id dari user yang sedang login
        $admin = Admin::where('user_id', $user->id)->first();

        // Pastikan admin ditemukan
        if (!$admin) {
            return redirect()->back()->withErrors('Admin tidak ditemukan');
        }
    
        // Buat unit satuan kerja dengan unit_id dari tabel admins
        $unitSatuanKerja = UnitSatuanKerja::create([
            'nama_satuan_kerja' => $request->nama_satuan_kerja,
            'nama_kepala' => $request->nama_kepala,
            'deskripsi' => $request->deskripsi,
            'unit_id' => $admin->unit_id, // Ambil unit_id dari tabel admins
        ]);
    
        // Simpan ruangan-ruangan yang diinput ke tabel ruangan
        if ($request->has('ruangans')) {
            // dd($request->ruangan);
            foreach ($request->ruangans as $namaRuangan) {
                if (!empty($namaRuangan)) {
                    $cekRuangan = Ruangan::create([
                        'nama_ruangan' => $namaRuangan,
                        'unit_satuan_kerja_id' => $unitSatuanKerja->id,
                    ]);
                }
            }
        }

    
        return redirect()->route('unit_satuan_kerjas.index')->with('success', 'Unit Satuan Kerja berhasil ditambahkan.');
    }
    
    // Menampilkan detail satuan kerja
    public function show($id)
    {
        $unitSatuanKerja = UnitSatuanKerja::findOrFail($id);
        return view('unit_satuan_kerjas.show', compact('unitSatuanKerja'));
    }

    // Menampilkan form untuk mengedit satuan kerja beserta ruangannya
    public function edit($id)
    {
        // Mengambil data Unit Satuan Kerja berdasarkan ID
        $unitSatuanKerja = UnitSatuanKerja::with('ruangans')->findOrFail($id); // Termasuk relasi ruangans
        $units = Unit::all(); // Mengambil semua unit untuk dropdown jika diperlukan

        return view('unit_satuan_kerjas.edit', compact('unitSatuanKerja', 'units'));
    }


    // Memperbarui data satuan kerja
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_satuan_kerja' => 'required|string|max:255',
            'nama_kepala' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'ruangans.*.nama_ruangan' => 'required|string|max:255', // Validasi ruangan
        ]);
    
        // Ambil data unit satuan kerja yang akan diupdate
        $unitSatuanKerja = UnitSatuanKerja::findOrFail($id);
        $unitSatuanKerja->update([
            'nama_satuan_kerja' => $validatedData['nama_satuan_kerja'],
            'nama_kepala' => $validatedData['nama_kepala'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);
    
        // Ambil ID ruangan yang diinput di form
        $inputRuanganIds = [];
        if ($request->has('ruangan')) {
            foreach ($request->ruangan as $ruanganInput) {
                // Jika ada ID ruangan, update ruangan
                if (isset($ruanganInput['id'])) {
                    $ruangan = Ruangan::find($ruanganInput['id']);
                    $ruangan->update(['nama_ruangan' => $ruanganInput['nama_ruangan']]);
                    $inputRuanganIds[] = $ruangan->id; // Simpan ID ruangan yang diinput
                } else {
                    // Jika tidak ada ID, tambahkan ruangan baru
                    $newRuangan = Ruangan::create([
                        'nama_ruangan' => $ruanganInput['nama_ruangan'],
                        'unit_satuan_kerja_id' => $unitSatuanKerja->id,
                    ]);
                    $inputRuanganIds[] = $newRuangan->id; // Simpan ID ruangan baru yang diinput
                }
            }
        }
    
        // Hapus ruangan yang tidak diinput di form (tidak ada di $inputRuanganIds)
        Ruangan::where('unit_satuan_kerja_id', $unitSatuanKerja->id)
                ->whereNotIn('id', $inputRuanganIds)
                ->delete();
    
        return redirect()->route('unit_satuan_kerjas.index')->with('success', 'Unit Satuan Kerja berhasil di update.');
    }
    
    // Menghapus satuan kerja
    public function destroy($id)
    {
        $unitSatuanKerja = UnitSatuanKerja::findOrFail($id);
        $unitSatuanKerja->delete();

        return redirect()->route('unit_satuan_kerjas.index')->with('success', 'Satuan Kerja berhasil dihapus');
    }
}
