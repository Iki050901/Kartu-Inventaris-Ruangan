@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 mt-5">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-extrabold text-blue-600">DATA INSTANSI</h1>
    </div>

    <!-- Detail Unit -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
        <h2 class="text-2xl font-bold mb-4">Lihat Instansi</h2>
        
        <div class="border border-gray-200 rounded-lg">
            <div class="bg-gray-100 p-4 border-b border-gray-200">
                Informasi Instansi
            </div>
            <div class="p-4">
                <p><strong class="font-semibold">Nama Instansi:</strong> {{ $unit->kantor }}</p>
                <p><strong class="font-semibold">Email Instansi:</strong> {{ $unit->email_kantor }}</p>
                <p><strong class="font-semibold">No. Kode Lokasi:</strong> {{ $unit->no_kode_lokasi }}</p>
                <p><strong class="font-semibold">Alamat Instansi:</strong> {{ $unit->alamat_kantor }}</p>
            </div>
        </div>
        
        <h3 class="text-xl font-semibold mt-6">Kepala Instansi</h3>
        
        <h4 class="text-lg font-semibold mt-4">Pejabat 1</h4>
        <p><strong class="font-semibold">Nama:</strong> {{ $unit->kepala_dinas_pejabat_1 }}</p>
        <p><strong class="font-semibold">Jabatan:</strong> {{ $unit->jabatan_pejabat_1 }}</p>
        <p><strong class="font-semibold">NIP:</strong> {{ $unit->nip_pejabat_1 }}</p>
        
        <h4 class="text-lg font-semibold mt-4">Pejabat 2</h4>
        <p><strong class="font-semibold">Nama:</strong> {{ $unit->kepala_dinas_pejabat_2 }}</p>
        <p><strong class="font-semibold">Jabatan:</strong> {{ $unit->jabatan_pejabat_2 }}</p>
        <p><strong class="font-semibold">NIP:</strong> {{ $unit->nip_pejabat_2 }}</p>
    </div>

    <!-- Back Button -->
    <a href="{{ route('units.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded shadow hover:bg-gray-700 inline-block mt-3">Kembali</a>
</div>
@endsection
