<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Inisialisasi query untuk model Unit
        $query = Unit::query();

        // Cek apakah ada parameter search dari input
        if ($request->has('search')) {
            // Tambahkan filter pencarian berdasarkan kantor, no_kode_lokasi, atau alamat_kantor
            $query->where('kantor', 'like', '%' . $request->search . '%')
                ->orWhere('no_kode_lokasi', 'like', '%' . $request->search . '%')
                ->orWhere('alamat_kantor', 'like', '%' . $request->search . '%');
        }

        // Dapatkan data dengan pagination, 10 data per halaman
        $units = $query->paginate(10);

        // Kirimkan data unit ke view
        return view('unit.index', compact('units'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Simpan data unit baru
        $unit = Unit::create($request->all());

        // Redirect ke halaman index unit
        return redirect()->route('units.index')->with('success', 'Unit berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unit = Unit::findOrFail($id);
        // Melempar data unit ke view 'units.show'
        return view('unit.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form untuk mengedit unit
        $unit = Unit::findOrFail($id);
        return view('unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Update data unit berdasarkan id
        $unit = Unit::find($id);
        $unit->update($request->all());

        // Redirect ke halaman edit unit dengan pesan sukses
        return redirect()->route('units.edit', $id)->with('success', 'Unit berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus unit dari database
        Unit::destroy($id);

        // Redirect dengan pesan sukses
        return redirect()->route('units.index')->with('success', 'Unit berhasil dihapus!');
    }
}
