<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileSuperController extends Controller
{
    // Menampilkan daftar admin
    public function index()
    {
        $user = auth()->user();
        return view('super_admin.profile', compact('user'));
    }

    // Menampilkan form untuk mengedit admin
    public function edit()
    {
        $user = auth()->user();
        return view('super_admin.profile-edit', compact('user'));
    }

    // Memperbarui data admin
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed', // Validasi password opsional
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return redirect()->route('super_admin.index')->with('success', 'Profil berhasil diperbarui');
    }    
}
