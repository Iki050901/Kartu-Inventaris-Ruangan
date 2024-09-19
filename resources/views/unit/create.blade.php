@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 mt-5">

    <!-- Tombol Kembali -->
    <div class="mb-4">
        <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">DATA KANTOR</h1>
    </div>

    <!-- Form Tambah Unit dalam Card -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Tambah Kantor</h2>
        
        <form action="{{ route('units.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div class="form-group">
                    <label for="kantor" class="block text-gray-700">Nama Kantor:</label>
                    <input type="text" id="kantor" name="kantor" class="form-control border rounded w-full p-2" value="{{ old('kantor') }}">
                    @error('kantor')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email_kantor" class="block text-gray-700">Email Kantor:</label>
                    <input type="email" id="email_kantor" name="email_kantor" class="form-control border rounded w-full p-2" value="{{ old('email_kantor') }}">
                    @error('email_kantor')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_kode_lokasi" class="block text-gray-700">No. Kode Lokasi:</label>
                    <input type="text" id="no_kode_lokasi" name="no_kode_lokasi" class="form-control border rounded w-full p-2" value="{{ old('no_kode_lokasi') }}">
                    @error('no_kode_lokasi')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat_kantor" class="block text-gray-700">Alamat Kantor:</label>
                    <input type="text" id="alamat_kantor" name="alamat_kantor" class="form-control border rounded w-full p-2" value="{{ old('alamat_kantor') }}">
                    @error('alamat_kantor')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <h3 class="text-xl font-semibold mb-4">Kepala Dinas</h3>

            <h4 class="text-lg font-semibold mb-2">Pejabat 1</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div class="form-group">
                    <label for="kepala_dinas_pejabat_1" class="block text-gray-700">Nama:</label>
                    <input type="text" id="kepala_dinas_pejabat_1" name="kepala_dinas_pejabat_1" class="form-control border rounded w-full p-2" value="{{ old('kepala_dinas_pejabat_1') }}">
                    @error('kepala_dinas_pejabat_1')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jabatan_pejabat_1" class="block text-gray-700">Jabatan:</label>
                    <input type="text" id="jabatan_pejabat_1" name="jabatan_pejabat_1" class="form-control border rounded w-full p-2" value="{{ old('jabatan_pejabat_1') }}">
                    @error('jabatan_pejabat_1')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="nip_pejabat_1" class="block text-gray-700">NIP:</label>
                    <input type="text" id="nip_pejabat_1" name="nip_pejabat_1" class="form-control border rounded w-full p-2" value="{{ old('nip_pejabat_1') }}">
                    @error('nip_pejabat_1')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <h4 class="text-lg font-semibold mb-2">Pejabat 2</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div class="form-group">
                    <label for="kepala_dinas_pejabat_2" class="block text-gray-700">Nama:</label>
                    <input type="text" id="kepala_dinas_pejabat_2" name="kepala_dinas_pejabat_2" class="form-control border rounded w-full p-2" value="{{ old('kepala_dinas_pejabat_2') }}">
                    @error('kepala_dinas_pejabat_2')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jabatan_pejabat_2" class="block text-gray-700">Jabatan:</label>
                    <input type="text" id="jabatan_pejabat_2" name="jabatan_pejabat_2" class="form-control border rounded w-full p-2" value="{{ old('jabatan_pejabat_2') }}">
                    @error('jabatan_pejabat_2')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="nip_pejabat_2" class="block text-gray-700">NIP:</label>
                    <input type="text" id="nip_pejabat_2" name="nip_pejabat_2" class="form-control border rounded w-full p-2" value="{{ old('nip_pejabat_2') }}">
                    @error('nip_pejabat_2')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded shadow hover:bg-blue-700">Simpan</button>
            <a href="{{ route('units.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded shadow hover:bg-gray-700">Batal</a>
        </form>
    </div>
</div>
@endsection
