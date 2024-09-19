<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Menampilkan daftar admin
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        // Query pencarian admin berdasarkan nama atau email
        $admins = Admin::with(['user', 'unit'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                          ->orWhere('email', 'like', '%' . $search . '%');
                });
            })
            ->paginate(10); // Pagination dengan 10 item per halaman
        
        // Return ke view dengan data admin
        return view('admins.index', compact('admins'));
    }    

    // Menampilkan form untuk menambah admin baru
    public function create()
    {
        $units = Unit::all(); // Mengambil semua unit untuk dropdown
        return view('admins.create', compact('units'));
    }

    // Menyimpan admin baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'unit_id' => 'required|exists:units,id',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Tambahkan nilai default untuk role
        $validated['role'] = 'admin';
    
        // Hash password
        $validated['password'] = Hash::make($validated['password']);
    
        // Membuat user sebagai admin
        $user = User::create([
            'name' => $validated['nama'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => $validated['role'],
        ]);
    
        // Membuat data admin
        Admin::create([
            'jabatan' => $validated['jabatan'],
            'unit_id' => $validated['unit_id'],
            'user_id' => $user->id, // Menghubungkan dengan tabel users
        ]);
    
        return redirect()->route('admins.index')->with('success', 'Admin berhasil ditambahkan');
    }    

    // Menampilkan detail admin
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.show', compact('admin'));
    }

    // Menampilkan form untuk mengedit admin
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $units = Unit::all(); // Mengambil semua unit untuk dropdown
        return view('admins.edit', compact('admin', 'units'));
    }

    // Memperbarui data admin
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $user = User::findOrFail($admin->user_id);
    
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $admin->user_id,
            'unit_id' => 'required|exists:units,id',
            'password' => 'nullable|string|min:8|confirmed', // Validasi password opsional
        ]);
    
        // Memperbarui data user
        $user->name = $request->nama;
        $user->email = $request->email;
    
        // Memperbarui password jika ada
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        // Memperbarui data admin
        $admin->update([
            'jabatan' => $request->jabatan,
            'unit_id' => $request->unit_id,
        ]);
    
        return redirect()->route('admins.index')->with('success', 'Admin berhasil diperbarui');
    }
    

    // Menghapus admin
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $user = User::findOrFail($admin->user_id);
        
        // Menghapus admin dan user yang terkait
        $admin->delete();
        $user->delete();

        return redirect()->route('admins.index')->with('success', 'Admin berhasil dihapus');
    }
}
