<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Admin;
use App\Models\Barang;
use App\Models\Pegawai;

class HomeController extends Controller
{
    // public function super()
    // {
    //     return view('pages.home');
    // }

    // public function admin()
    // {
    //     return view('admin.home');
    // }

    // public function pegawai()
    // {
    //     // return view('user.home');
    //     return view('barangs.index');
    // }

    public function redirectBasedOnRole()
    {
        $user = auth()->user();

        if ($user->role == 'superadmin') {
            // Mengambil total kantor/unit
            $totalKantor = Unit::count();

            // Mengambil total admin
            $totalAdmin = Admin::count();

            // Mengambil data untuk  berdasarkan tahun
            $barangData = Barang::selectRaw('tahun_pembuatan_pembelian as tahun, keadaan_barang, COUNT(*) as jumlah')
                ->groupBy('tahun', 'keadaan_barang')
                ->orderBy('tahun', 'asc')
                ->get();

            // Memisahkan data menjadi format yang sesuai untuk Chart.js
            $tahunPembelian = $barangData->pluck('tahun')->unique();
            $jumlahBaik = $barangData->where('keadaan_barang', 'baik')->pluck('jumlah');
            $jumlahKurangBaik = $barangData->where('keadaan_barang', 'kurang baik')->pluck('jumlah');
            $jumlahRusak = $barangData->where('keadaan_barang', 'rusak')->pluck('jumlah');

            return view('super_admin.home', compact('totalKantor', 'totalAdmin', 'tahunPembelian', 'jumlahBaik', 'jumlahKurangBaik', 'jumlahRusak'));
        } elseif ($user->role == 'admin') {
            $user = auth()->user();
            $admin = Admin::where('user_id', $user->id)->first();
            $unitId = $admin->unit_id;

            // Menghitung total satuan kerja, barang, dan pegawai yang terkait dengan unit admin
            $totalSatuanKerja = Unit::where('id', $unitId)->count();
            // $totalPegawai = Pegawai::where('unit_id', $unitId)->count();
            $totalPegawai = Pegawai::whereHas('unitSatuanKerja', function ($query) use ($unitId) {
                $query->where('unit_id', $unitId);
            })->count();

            // Menghitung total barang yang berada dalam unit_id admin yang login
            $totalBarang = Barang::whereHas('ruangan.unitSatuanKerja', function ($query) use ($unitId) {
                $query->where('unit_id', $unitId);
            })->count();

            // Menghitung barang berdasarkan kondisi yang berada dalam unit_id admin yang login
            $barangBaik = Barang::where('keadaan_barang', 'baik')
                ->whereHas('ruangan.unitSatuanKerja', function ($query) use ($unitId) {
                    $query->where('unit_id', $unitId);
                })->count();

            $barangKurangBaik = Barang::where('keadaan_barang', 'kurang baik')
                ->whereHas('ruangan.unitSatuanKerja', function ($query) use ($unitId) {
                    $query->where('unit_id', $unitId);
                })->count();

            $barangRusak = Barang::where('keadaan_barang', 'rusak')
                ->whereHas('ruangan.unitSatuanKerja', function ($query) use ($unitId) {
                    $query->where('unit_id', $unitId);
                })->count();

            // Mengambil data untuk grafik berdasarkan tahun pembuatan/pembelian
            $grafikTahun = Barang::whereHas('ruangan.unitSatuanKerja', function ($query) use ($unitId) {
                $query->where('unit_id', $unitId);
            })
                ->selectRaw('tahun_pembuatan_pembelian as tahun, COUNT(*) as jumlah')
                ->groupBy('tahun')
                ->orderBy('tahun', 'asc')
                ->get();

            return view('admin.home', compact('totalSatuanKerja', 'totalBarang', 'totalPegawai', 'barangBaik', 'barangKurangBaik', 'barangRusak', 'grafikTahun'));
            // return view('admin.home');
        } elseif ($user->role == 'user') {
            return redirect()->route('barangs.index');
        } else {
            return redirect()->route('login');
        }
    }
}
