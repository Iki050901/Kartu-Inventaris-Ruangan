<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\UnitSatuanKerja;
use App\Models\Ruangan;
use App\Models\Barang;
use App\Models\Admin;

class LaporanController extends Controller
{
    public function superAdmin(Request $request)
    {
        // Ambil parameter pencarian dan jumlah baris yang diinginkan
        $search = $request->get('search');
        $rows = $request->get('rows', 10); // Default 10 rows per page

        // Query untuk mendapatkan data unit dengan penghitungan relasi
        $unitsQuery = Unit::when($search, function ($query, $search) {
            // Pencarian berdasarkan nama unit
            return $query->where('kantor', 'like', "%{$search}%");
        })
            ->withCount([
                'unitSatuanKerjas as jumlah_unit_kerja',  // Menghitung jumlah unit kerja
            ]);

        // Gunakan paginate di sini sebelum get()
        $units = $unitsQuery->paginate($rows);

        // Looping untuk menghitung jumlah ruangan dan barang pada setiap unit
        foreach ($units as $unit) {
            // Hitung jumlah ruangan dari unit
            $unit->jumlah_ruangan = Ruangan::whereHas('unitSatuanKerja', function ($query) use ($unit) {
                $query->where('unit_id', $unit->id);
            })->count();

            // Hitung jumlah barang dari unit
            $unit->jumlah_barang = Barang::whereHas('ruangan.unitSatuanKerja', function ($query) use ($unit) {
                $query->where('unit_id', $unit->id);
            })->count();

            // Hitung barang berdasarkan kondisi
            $unit->barang_baik = Barang::whereHas('ruangan.unitSatuanKerja', function ($query) use ($unit) {
                $query->where('unit_id', $unit->id);
            })->where('keadaan_barang', 'baik')->count();

            $unit->barang_kurang_baik = Barang::whereHas('ruangan.unitSatuanKerja', function ($query) use ($unit) {
                $query->where('unit_id', $unit->id);
            })->where('keadaan_barang', 'kurang_baik')->count();

            $unit->barang_buruk = Barang::whereHas('ruangan.unitSatuanKerja', function ($query) use ($unit) {
                $query->where('unit_id', $unit->id);
            })->where('keadaan_barang', 'rusak')->count();
        }

        // Kembalikan data ke view dengan pagination
        return view('super_admin.laporan', compact('units'));
    }

    public function print()
    {
        $units = Unit::with('unitSatuanKerjas')->get(); // Mengambil unit dengan relasi unitSatuanKerja

        // Looping untuk menghitung jumlah ruangan dan barang pada setiap unit
        foreach ($units as $unit) {
            // Hitung jumlah unit satuan kerja dari unit
            $unit->jumlah_unit_kerja = $unit->unitSatuanKerjas->count();

            // Hitung jumlah ruangan dari unit
            $unit->jumlah_ruangan = Ruangan::whereHas('unitSatuanKerja', function ($query) use ($unit) {
                $query->where('unit_id', $unit->id); // Menggunakan relasi unitSatuanKerja
            })->count();

            // Hitung jumlah barang dari unit
            $unit->jumlah_barang = Barang::whereHas('ruangan.unitSatuanKerja', function ($query) use ($unit) {
                $query->where('unit_id', $unit->id); // Menggunakan relasi unitSatuanKerja
            })->count();

            // Hitung barang berdasarkan kondisi
            $unit->barang_baik = Barang::whereHas('ruangan.unitSatuanKerja', function ($query) use ($unit) {
                $query->where('unit_id', $unit->id);
            })->where('keadaan_barang', 'baik')->count();

            $unit->barang_kurang_baik = Barang::whereHas('ruangan.unitSatuanKerja', function ($query) use ($unit) {
                $query->where('unit_id', $unit->id);
            })->where('keadaan_barang', 'kurang_baik')->count();

            $unit->barang_buruk = Barang::whereHas('ruangan.unitSatuanKerja', function ($query) use ($unit) {
                $query->where('unit_id', $unit->id);
            })->where('keadaan_barang', 'rusak')->count();
        }

        return view('super_admin.laporan-print', compact('units'));
    }

    public function laporanBarang(Request $request)
    {
        // Ambil ID pengguna yang sedang login
        $userId = auth()->user()->id;

        // Dapatkan unit_id dari tabel admin berdasarkan user_id
        $admin = Admin::where('user_id', $userId)->first();
        $unitId = $admin->unit_id;

        // Ambil parameter pencarian dan filter
        $search = $request->input('search');
        $satuanKerjaId = $request->get('satuan_kerja_id');

        // Query untuk mendapatkan data unit_satuan_kerja berdasarkan unit_id dari admin yang login
        $unitsQuery = UnitSatuanKerja::where('unit_id', $unitId)
            ->when($search, function ($query, $search) {
                // Cari berdasarkan nama ruangan yang terkait dengan unit_satuan_kerja
                return $query->whereHas('ruangans', function ($q) use ($search) {
                    $q->where('nama_ruangan', 'like', "%{$search}%");
                });
            })
            ->when($satuanKerjaId, function ($query, $satuanKerjaId) {
                // Filter berdasarkan satuan kerja
                return $query->where('id', $satuanKerjaId);
            })
            ->with('ruangans')  // Ambil relasi ke Ruangan
            ->paginate(10);

        // Looping untuk menghitung jumlah barang di setiap unit_satuan_kerja berdasarkan kondisi
        foreach ($unitsQuery as $unit) {
            // Hitung jumlah ruangan yang dimiliki oleh unit_satuan_kerja
            $unit->jumlah_ruangan = $unit->ruangans->count();

            // Hitung jumlah barang di semua ruangan yang dimiliki unit_satuan_kerja
            $unit->jumlah_barang = Barang::whereHas('ruangan', function ($query) use ($unit) {
                $query->where('unit_satuan_kerja_id', $unit->id);
            })->count();

            // Hitung barang berdasarkan kondisi (baik, kurang baik, buruk)
            $unit->barang_baik = Barang::whereHas('ruangan', function ($query) use ($unit) {
                $query->where('unit_satuan_kerja_id', $unit->id);
            })->where('keadaan_barang', 'baik')->count();

            $unit->barang_kurang_baik = Barang::whereHas('ruangan', function ($query) use ($unit) {
                $query->where('unit_satuan_kerja_id', $unit->id);
            })->where('keadaan_barang', 'kurang_baik')->count();

            $unit->barang_buruk = Barang::whereHas('ruangan', function ($query) use ($unit) {
                $query->where('unit_satuan_kerja_id', $unit->id);
            })->where('keadaan_barang', 'rusak')->count();
        }

        // Jika request menggunakan AJAX, kirimkan hasil dalam bentuk HTML yang dirender
        if ($request->ajax()) {
            return response()->json([
                'html' => view('admin.laporan-data', compact('unitsQuery'))->render()
            ]);
        }

        // Ambil semua data satuan kerja untuk dropdown
        $satuanKerjas = UnitSatuanKerja::all();

        return view('admin.laporan', compact('unitsQuery', 'satuanKerjas'));
    }

    public function printBarang(Request $request)
    {
        $ruangan_id = $request->get('ruangan_id');


        // Ambil semua ruangan untuk dropdown
        $ruangans = Ruangan::all();

        // Jika ruangan_id ada, ambil barang-barang dari ruangan tersebut
        $barangs = collect(); // Inisialisasi koleksi kosong
        $ruangan = null;
        $unit = null;
        $unitKerja = null;

        if ($ruangan_id) {
            $barangs = Barang::where('ruangan_id', $ruangan_id)->get();

            // Ambil ruangan yang dipilih
            $ruangan = Ruangan::find($ruangan_id);

            if ($ruangan) {
                // Ambil unit kerja berdasarkan ruangan
                $unitKerja = UnitSatuanKerja::where('id', $ruangan->unit_satuan_kerja_id)->first();

                // Ambil unit berdasarkan unit kerja
                if ($unitKerja) {
                    $unit = Unit::where('id', $unitKerja->unit_id)->first();
                }
            }
        }

        // Kembalikan data ke view print
        return view('barangs.print', compact('barangs', 'ruangan', 'ruangans', 'unit', 'unitKerja'));
    }
}
