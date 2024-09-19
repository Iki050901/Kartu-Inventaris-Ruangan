@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="font-arial mb-6 font-extrabold text-3xl" style="color:#2284DF">
        DATA SATUAN KERJA
    </h1>

    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6 flex space-x-6">
        <!-- Bagian Detail di Kiri -->
        <div class="flex-1 space-y-6">
            <!-- Nama Satuan Kerja -->
            <div class="flex flex-col">
                <label for="nama_satuan_kerja" class="text-gray-700 font-medium mb-2">Nama Satuan Kerja</label>
                <input type="text" id="nama_satuan_kerja" class="p-3 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed" value="{{ $unitSatuanKerja->nama_satuan_kerja }}" readonly>
            </div>

            <!-- Nama Kepala -->
            <div class="flex flex-col">
                <label for="nama_kepala" class="text-gray-700 font-medium mb-2">Nama Kepala</label>
                <input type="text" id="nama_kepala" class="p-3 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed" value="{{ $unitSatuanKerja->nama_kepala }}" readonly>
            </div>

            <!-- Deskripsi -->
            <div class="flex flex-col">
                <label for="deskripsi" class="text-gray-700 font-medium mb-2">Deskripsi</label>
                <textarea id="deskripsi" class="p-3 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed" readonly>{{ $unitSatuanKerja->deskripsi }}</textarea>
            </div>
        </div>

        <!-- Bagian Ruangan di Kanan -->
        <div class="flex-1 space-y-6">
            <div class="flex flex-col">
                <label for="ruangan" class="text-gray-700 font-medium mb-2">Ruangan</label>
                <ul class="list-disc pl-5">
                    @foreach ($unitSatuanKerja->ruangans as $ruangan)
                    <li class="mb-2">{{ $ruangan->nama_ruangan }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-6 flex space-x-4">
        <a href="{{ route('unit_satuan_kerjas.edit', $unitSatuanKerja->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Edit</a>
        <a href="{{ route('unit_satuan_kerjas.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400">Kembali</a>
        <form action="{{ route('unit_satuan_kerjas.destroy', $unitSatuanKerja->id) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
        </form>
    </div>
</div>
@endsection
