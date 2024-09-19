@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">EDIT PEGAWAI</h1>

    <form action="{{ route('data_pegawais.update', $dataPegawai->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" id="name" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $dataPegawai->user->name }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $dataPegawai->user->email }}" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <small class="text-gray-500">Kosongkan jika tidak ingin mengubah password</small>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $dataPegawai->jabatan }}" required>
        </div>

        <div class="mb-4">
            <label for="unit_satuan_kerja_id" class="block text-sm font-medium text-gray-700">Unit Satuan Kerja</label>
            <select name="unit_satuan_kerja_id" id="unit_satuan_kerja_id" class="form-select mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                @foreach ($unitSatuanKerjas as $unit)
                <option value="{{ $unit->id }}" {{ $dataPegawai->unit_satuan_kerja_id == $unit->id ? 'selected' : '' }}>
                    {{ $unit->nama_satuan_kerja }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4 flex space-x-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Update</button>
            <a href="{{ route('data_pegawais.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-600">Batal</a>
        </div>

        <!-- <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Update</button> -->
    </form>
</div>
@endsection