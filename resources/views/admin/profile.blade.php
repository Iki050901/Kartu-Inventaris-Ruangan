@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">PENGATURAN PROFILE</h1>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Informasi Admin</h2>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold">Nama</label>
            <p class="mt-1 block w-full">{{ $admin->user->name }}</p>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold">Email</label>
            <p class="mt-1 block w-full">{{ $admin->user->email }}</p>
        </div>

        <div class="mb-4">
            <label for="unit" class="block text-gray-700 font-semibold">Unit</label>
            <p class="mt-1 block w-full">{{ $admin->unit->kantor }}</p>
        </div>

        <div class="mb-4">
            <label for="email_kantor" class="block text-gray-700 font-semibold">Email Kantor</label>
            <p class="mt-1 block w-full">{{ $admin->unit->email_kantor }}</p>
        </div>

        <div class="mb-4">
            <label for="no_kode_lokasi" class="block text-gray-700 font-semibold">No Kode Lokasi</label>
            <p class="mt-1 block w-full">{{ $admin->unit->no_kode_lokasi }}</p>
        </div>

        <div class="mb-4">
            <label for="alamat_kantor" class="block text-gray-700 font-semibold">Alamat Kantor</label>
            <p class="mt-1 block w-full">{{ $admin->unit->alamat_kantor }}</p>
        </div>

        <div class="mb-4">
            <label for="kepala_dinas_pejabat_1" class="block text-gray-700 font-semibold">Kepala Dinas Pejabat 1</label>
            <p class="mt-1 block w-full">{{ $admin->unit->kepala_dinas_pejabat_1 }}</p>
        </div>

        <div class="mb-4">
            <label for="jabatan_pejabat_1" class="block text-gray-700 font-semibold">Jabatan Pejabat 1</label>
            <p class="mt-1 block w-full">{{ $admin->unit->jabatan_pejabat_1 }}</p>
        </div>

        <div class="mb-4">
            <label for="nip_pejabat_1" class="block text-gray-700 font-semibold">NIP Pejabat 1</label>
            <p class="mt-1 block w-full">{{ $admin->unit->nip_pejabat_1 }}</p>
        </div>

        <div class="mb-4">
            <label for="kepala_dinas_pejabat_2" class="block text-gray-700 font-semibold">Kepala Dinas Pejabat 2</label>
            <p class="mt-1 block w-full">{{ $admin->unit->kepala_dinas_pejabat_2 }}</p>
        </div>

        <div class="mb-4">
            <label for="jabatan_pejabat_2" class="block text-gray-700 font-semibold">Jabatan Pejabat 2</label>
            <p class="mt-1 block w-full">{{ $admin->unit->jabatan_pejabat_2 }}</p>
        </div>

        <div class="mb-4">
            <label for="nip_pejabat_2" class="block text-gray-700 font-semibold">NIP Pejabat 2</label>
            <p class="mt-1 block w-full">{{ $admin->unit->nip_pejabat_2 }}</p>
        </div>
    </div>

    <div class="flex justify-end space-x-1">
        <a href="{{ route('profile_admin.edit', $admin->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Edit
        </a>
        <a href="{{ route('profile_admin.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</a>
    </div>
</div>
@endsection
