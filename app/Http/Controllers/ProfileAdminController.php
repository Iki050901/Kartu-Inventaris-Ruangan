<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileAdminController extends Controller
{
    /**
     * Display the profile of the logged-in admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mendapatkan admin yang sedang login
        $admin = Auth::user()->admin;
        $unit = Unit::where('id', $admin->unit_id)->first();

        return view('admin.profile', compact('admin', 'unit'));
    }

    /**
     * Show the form for editing the profile of the logged-in admin.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // Mendapatkan admin yang sedang login
        $admin = Auth::user()->admin;
        $units = Unit::all();
        $unit = Unit::where('id', $admin->unit_id)->first();

        return view('admin.profile-edit', compact('admin', 'units', 'unit'));
    }

    /**
     * Update the profile of the logged-in admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $admin = Auth::user()->admin;
        $unit = $admin->unit;

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'unit_id' => 'required|exists:units,id',
            'unit.email_kantor' => 'required|email',
            'unit.no_kode_lokasi' => 'required|string|max:255',
            'unit.alamat_kantor' => 'required|string',
            'unit.kepala_dinas_pejabat_1' => 'nullable|string',
            'unit.jabatan_pejabat_1' => 'nullable|string',
            'unit.nip_pejabat_1' => 'nullable|string',
            'unit.kepala_dinas_pejabat_2' => 'nullable|string',
            'unit.jabatan_pejabat_2' => 'nullable|string',
            'unit.nip_pejabat_2' => 'nullable|string',
        ]);

        // Update data user
        $admin->user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $admin->user->password,
        ]);

        // Update data unit
        $unit = Unit::findOrFail($request->unit_id);
        $unit->update($request->input('unit'));

        // Update relasi admin dengan unit
        $admin->update(['unit_id' => $unit->id]);

        return redirect()->route('profile_admin.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
