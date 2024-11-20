@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 mt-5">

    <!-- Judul Form -->
    <div class="mb-6">
        <h1 class="font-arial font-extrabold text-4xl mb-4" style="color:#2284DF">DATA ADMIN</h1>
    </div>

    <!-- Form Edit Admin dalam Card -->
    <div class="bg-white p-4 rounded-lg shadow-lg">
        <div class="p-4">
            <form action="{{ route('admins.update', $admin->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                    <div class="form-group">
                        <label for="nama" class="block text-gray-700">Nama:</label>
                        <input type="text" id="nama" name="nama" class="form-control border rounded w-full p-2" value="{{ $admin->user->name }}" required>
                        @error('nama')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="jabatan" class="block text-gray-700">Jabatan:</label>
                        <input type="text" id="jabatan" name="jabatan" class="form-control border rounded w-full p-2" value="{{ $admin->jabatan }}" required>
                        @error('jabatan')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="block text-gray-700">Email:</label>
                        <input type="email" id="email" name="email" class="form-control border rounded w-full p-2" value="{{ $admin->user->email }}" required>
                        @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="unit_id" class="block text-gray-700">Pilih Instansi:</label>
                        <select name="unit_id" id="unit_id" class="form-control border rounded w-full p-2">
                            @foreach($units as $unit)
                            <option value="{{ $unit->id }}" {{ $unit->id == $admin->unit_id ? 'selected' : '' }}>
                                {{ $unit->kantor }}
                            </option>
                            @endforeach
                        </select>
                        @error('unit_id')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="block text-gray-700">Password Baru:</label>
                        <input type="password" id="password" name="password" class="form-control border rounded w-full p-2">
                        @error('password')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password_confirmation" class="block text-gray-700">Konfirmasi Password:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control border rounded w-full p-2">
                        @error('password_confirmation')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <!-- Tombol Simpan dan Batal di sebelah kanan -->
                <div class="flex justify-end space-x-4 mt-4">
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded shadow hover:bg-blue-700">Perbarui</button>
                    <a href="{{ route('admins.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded shadow hover:bg-gray-700">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
