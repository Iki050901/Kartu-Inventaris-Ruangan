@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">DATA PEGAWAI</h1>


    <div class="bg-white shadow-md rounded-lg p-6 mb-4">
        <div class="space-y-4">
            <h4 class="text-xl font-semibold">Nama: {{ $dataPegawai->user->name }}</h4>
            <p class="text-sm text-gray-700"><strong>Jabatan:</strong> {{ $dataPegawai->jabatan }}</p>
            <p class="text-sm text-gray-700"><strong>Email:</strong> {{ $dataPegawai->user->email }}</p>
            <p class="text-sm text-gray-700"><strong>Password:</strong> <span class="font-mono tracking-wider">********</span></p> <!-- Password masked with stars -->
            <p class="text-sm text-gray-700"><strong>Unit Satuan Kerja:</strong> {{ $dataPegawai->unitSatuanKerja->nama_satuan_kerja }}</p>
            <!-- <p class="text-sm text-gray-700"><strong>Dibuat pada:</strong> {{ $dataPegawai->created_at->format('d M Y') }}</p> -->
            <!-- <p class="text-sm text-gray-700"><strong>Diupdate pada:</strong> {{ $dataPegawai->updated_at->format('d M Y') }}</p> -->
        </div>
    </div>

    <a href="{{ route('data_pegawais.edit', $dataPegawai->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow hover:bg-yellow-600">Edit</a>
    <a href="{{ route('data_pegawais.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-600">Kembali</a>

</div>
@endsection