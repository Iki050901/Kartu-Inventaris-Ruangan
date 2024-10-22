@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">PENGATURAN PROFILE</h1>


    <form action="{{ route('profile_admin.update', $admin->id) }}" method="POST" class="bg-white border border-gray-200 rounded-lg shadow-md p-6">
        @csrf
        @method('PATCH')

        <div class="bg-gray-50 shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Informasi Admin</h2>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Nama</label>
                <input type="text" id="name" name="name" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300" value="{{ old('name', $admin->user->name) }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" id="email" name="email" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300" value="{{ old('email', $admin->user->email) }}" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold">Password</label>
                <input type="password" id="password" name="password" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300" placeholder="Kosongkan jika tidak diubah">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-semibold">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300" placeholder="Kosongkan jika tidak diubah">
            </div>
        </div>

        <div class="bg-gray-50 shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Informasi Unit</h2>

            <div class="mb-4">
                <label for="unit_id" class="block text-gray-700 font-semibold">Pilih Instansi</label>
                <select name="unit_id" id="unit_id" class="mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500">
                    @foreach($units as $unit)
                        <option value="{{ $unit->id }}" {{ $unit->id == $admin->unit_id ? 'selected' : '' }}>
                            {{ $unit->kantor }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="email_kantor" class="block text-gray-700 font-semibold">Email Kantor</label>
                <input type="email" id="email_kantor" name="unit[email_kantor]" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300" value="{{ old('unit.email_kantor', $unit->email_kantor) }}" required>
            </div>

            <div class="mb-4">
                <label for="no_kode_lokasi" class="block text-gray-700 font-semibold">No Kode Lokasi</label>
                <input type="text" id="no_kode_lokasi" name="unit[no_kode_lokasi]" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300" value="{{ old('unit.no_kode_lokasi', $unit->no_kode_lokasi) }}" required>
            </div>

            <div class="mb-4">
                <label for="alamat_kantor" class="block text-gray-700 font-semibold">Alamat Kantor</label>
                <textarea id="alamat_kantor" name="unit[alamat_kantor]" class="form-textarea mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300" rows="3">{{ old('unit.alamat_kantor', $unit->alamat_kantor) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="kepala_dinas_pejabat_1" class="block text-gray-700 font-semibold">Kepala Dinas Pejabat 1</label>
                <input type="text" id="kepala_dinas_pejabat_1" name="unit[kepala_dinas_pejabat_1]" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300" value="{{ old('unit.kepala_dinas_pejabat_1', $unit->kepala_dinas_pejabat_1) }}">
            </div>

            <div class="mb-4">
                <label for="jabatan_pejabat_1" class="block text-gray-700 font-semibold">Jabatan Pejabat 1</label>
                <input type="text" id="jabatan_pejabat_1" name="unit[jabatan_pejabat_1]" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300" value="{{ old('unit.jabatan_pejabat_1', $unit->jabatan_pejabat_1) }}">
            </div>

            <div class="mb-4">
                <label for="nip_pejabat_1" class="block text-gray-700 font-semibold">NIP Pejabat 1</label>
                <input type="text" id="nip_pejabat_1" name="unit[nip_pejabat_1]" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300" value="{{ old('unit.nip_pejabat_1', $unit->nip_pejabat_1) }}">
            </div>

            <div class="mb-4">
                <label for="kepala_dinas_pejabat_2" class="block text-gray-700 font-semibold">Kepala Dinas Pejabat 2</label>
                <input type="text" id="kepala_dinas_pejabat_2" name="unit[kepala_dinas_pejabat_2]" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300" value="{{ old('unit.kepala_dinas_pejabat_2', $unit->kepala_dinas_pejabat_2) }}">
            </div>

            <div class="mb-4">
                <label for="jabatan_pejabat_2" class="block text-gray-700 font-semibold">Jabatan Pejabat 2</label>
                <input type="text" id="jabatan_pejabat_2" name="unit[jabatan_pejabat_2]" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300" value="{{ old('unit.jabatan_pejabat_2', $unit->jabatan_pejabat_2) }}">
            </div>

            <div class="mb-4">
                <label for="nip_pejabat_2" class="block text-gray-700 font-semibold">NIP Pejabat 2</label>
                <input type="text" id="nip_pejabat_2" name="unit[nip_pejabat_2]" class="form-input mt-1 block w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-300" value="{{ old('unit.nip_pejabat_2', $unit->nip_pejabat_2) }}">
            </div>
        </div>

        <div class="flex justify-end space-x-1">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                Perbarui
            </button>
            <a href="{{ route('profile_admin.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400">Kembali</a>
        </div>
    </form>
</div>
@endsection
