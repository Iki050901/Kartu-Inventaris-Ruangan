@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">TAMBAH PEGAWAI</h1>


    <form action="{{ route('data_pegawais.store') }}" method="POST" class="bg-white border border-gray-200 rounded-lg shadow-md p-6">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-1">Nama</label>
            <input type="text" name="name" id="name" class="form-control border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-300" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
            <input type="email" name="email" id="email" class="form-control border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-300" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-semibold mb-1">Password</label>
            <input type="password" name="password" id="password" class="form-control border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-300" required>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-semibold mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-300" required>
        </div>

        <div class="mb-4">
            <label for="jabatan" class="block text-gray-700 font-semibold mb-1">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-300" required>
        </div>

        <div class="mb-4">
            <label for="unit_satuan_kerja_id" class="block text-gray-700 font-semibold mb-1">Unit Satuan Kerja</label>
            <select name="unit_satuan_kerja_id" id="unit_satuan_kerja_id" class="form-control border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-300" required>
                @foreach ($unitSatuanKerjas as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->nama_satuan_kerja }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Simpan</button>
        <a href="{{ route('data_pegawais.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400">Kembali</a>
    </form>
</div>
@endsection
