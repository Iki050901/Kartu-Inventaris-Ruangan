<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\UnitSatuanKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    // Menampilkan daftar pegawai
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        // Query dasar untuk data pegawai
        $query = Pegawai::with(['user', 'unitSatuanKerja']);
    
        // Filter pencarian berdasarkan nama pegawai
        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%");
            });
        }
    
        // Ambil data pegawai yang difilter dan paginasi
        $dataPegawais = $query->paginate(10);
    
        return view('data_pegawais.index', compact('dataPegawais'));
    }
    

    // Menampilkan form untuk tambah pegawai
    public function create()
    {
        $unitSatuanKerjas = UnitSatuanKerja::all();
        return view('data_pegawais.create', compact('unitSatuanKerjas'));
    }

    // Menyimpan pegawai baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',  // Menggunakan konfirmasi password
            'jabatan' => 'required',
            'unit_satuan_kerja_id' => 'required|exists:unit_satuan_kerjas,id',
        ]);
    
        // Membuat user baru dengan role 'user'
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
            'role' => 'user', // Menetapkan role
        ]);
    
        // Membuat data pegawai dengan relasi ke user yang baru dibuat
        Pegawai::create([
            'user_id' => $user->id,
            'jabatan' => $request->jabatan,
            'unit_satuan_kerja_id' => $request->unit_satuan_kerja_id,
        ]);
    
        return redirect()->route('data_pegawais.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }    

    // Menampilkan form untuk edit pegawai
    public function edit($id)
    {
        $dataPegawai = Pegawai::findOrFail($id);
        $unitSatuanKerjas = UnitSatuanKerja::all();
        return view('data_pegawais.edit', compact('dataPegawai', 'unitSatuanKerjas'));
    }

    // Mengupdate data pegawai
    public function update(Request $request, $id)
    {
        $dataPegawai = Pegawai::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $dataPegawai->user_id,
            'password' => 'nullable|min:6|confirmed', // Password opsional saat update
            'jabatan' => 'required',
            'unit_satuan_kerja_id' => 'required|exists:unit_satuan_kerjas,id',
        ]);

        // Update data user
        $dataPegawai->user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $dataPegawai->user->password,
        ]);

        // Update data pegawai
        $dataPegawai->update([
            'jabatan' => $request->jabatan,
            'unit_satuan_kerja_id' => $request->unit_satuan_kerja_id,
        ]);

        return redirect()->route('data_pegawais.index')->with('success', 'Data pegawai berhasil diupdate.');
    }

    public function show($id)
    {
        $dataPegawai = Pegawai::with('user', 'unitSatuanKerja')->findOrFail($id);
        return view('data_pegawais.show', compact('dataPegawai'));
    }

    // Menghapus data pegawai
    public function destroy($id)
    {
        $dataPegawai = Pegawai::findOrFail($id);
        $dataPegawai->user->delete(); // Menghapus user dan data pegawai
        return redirect()->route('data_pegawais.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
