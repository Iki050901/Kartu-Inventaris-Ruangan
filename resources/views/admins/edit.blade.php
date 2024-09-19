@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="font-arial text-blue-500 mb-6 font-extrabold" style="font-size: 30px; line-height: 52px; text-align: left;">
        DATA ADMIN
    </h1>

    <form action="{{ route('admins.update', $admin->id) }}" method="POST" class="space-y-4 w-12/13 mx-auto p-8 bg-white shadow-lg rounded-lg">
        @csrf
        @method('PUT')

        <div>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" class="mt-1 block w-3/4 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3" value="{{ $admin->user->name }}" required>
        </div>

        <div>
            <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
            <input type="text" name="jabatan" class="mt-1 block w-3/4 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3" value="{{ $admin->jabatan }}" required>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" class="mt-1 block w-3/4 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3" value="{{ $admin->user->email }}" required>
        </div>

        <div>
            <label for="unit_id" class="block text-sm font-medium text-gray-700">Pilih Unit</label>
            <select name="unit_id" class="mt-1 block w-3/4 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}" {{ $unit->id == $admin->unit_id ? 'selected' : '' }}>
                        {{ $unit->kantor }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Input untuk Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
            <input type="password" name="password" class="mt-1 block w-3/4 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
        </div>

        <!-- Input untuk Konfirmasi Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="mt-1 block w-3/4 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-3">
        </div>
        
        <div class="flex justify-end space-x-2">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Perbarui</button>
            <a href="{{ route('admins.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</a>
        </div>
    </form>
    
</div>
@endsection
