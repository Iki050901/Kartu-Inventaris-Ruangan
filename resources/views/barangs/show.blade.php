@extends('layouts.general')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Detail Barang</h1>

    <!-- Informasi Unit -->
    <div class="mb-4 p-4 border border-gray-300 rounded-lg shadow-md bg-gray-50">
        <h3 class="text-xl font-semibold mb-3">Informasi Unit</h3>
        <p class="text-sm mb-2"><strong>No Kode Lokasi Unit:</strong> {{ $unit->no_kode_lokasi }}</p>
        <p class="text-sm mb-2"><strong>Unit:</strong> {{ $unit->kantor }}</p>
        <p class="text-sm mb-2"><strong>Unit Satuan Kerja:</strong> {{ $unitSatuanKerja->nama_satuan_kerja }}</p>
    </div>

    <!-- Detail Barang dengan layout dua kolom -->
    <div class="border border-gray-300 rounded-lg shadow-md overflow-hidden bg-white">
        <div class="p-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kolom Kiri -->
                <div class="space-y-4">
                    <div class="border border-gray-200 rounded-md p-4 bg-gray-100">
                        <label class="block font-semibold text-gray-700 text-sm mb-1"><strong>Jenis/Nama Barang:</strong></label>
                        <p class="text-sm text-gray-900">{{ $barang->jenis_nama_barang }}</p>
                    </div>

                    <div class="border border-gray-200 rounded-md p-4 bg-gray-100">
                        <label class="block font-semibold text-gray-700 text-sm mb-1"><strong>Merk/Model:</strong></label>
                        <p class="text-sm text-gray-900">{{ $barang->merk_model }}</p>
                    </div>

                    <div class="border border-gray-200 rounded-md p-4 bg-gray-100">
                        <label class="block font-semibold text-gray-700 text-sm mb-1"><strong>No Seri Pabrik:</strong></label>
                        <p class="text-sm text-gray-900">{{ $barang->no_seri_pabrik }}</p>
                    </div>

                    <div class="border border-gray-200 rounded-md p-4 bg-gray-100">
                        <label class="block font-semibold text-gray-700 text-sm mb-1"><strong>Ukuran:</strong></label>
                        <p class="text-sm text-gray-900">{{ $barang->ukuran }}</p>
                    </div>

                    <div class="border border-gray-200 rounded-md p-4 bg-gray-100">
                        <label class="block font-semibold text-gray-700 text-sm mb-1"><strong>Bahan:</strong></label>
                        <p class="text-sm text-gray-900">{{ $barang->bahan }}</p>
                    </div>

                    <div class="border border-gray-200 rounded-md p-4 bg-gray-100">
                        <label class="block font-semibold text-gray-700 text-sm mb-1"><strong>Tahun Pembuatan/Pembelian:</strong></label>
                        <p class="text-sm text-gray-900">{{ $barang->tahun_pembuatan_pembelian }}</p>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="space-y-4">
                    <div class="border border-gray-200 rounded-md p-4 bg-gray-100">
                        <label class="block font-semibold text-gray-700 text-sm mb-1"><strong>No Kode Barang:</strong></label>
                        <p class="text-sm text-gray-900">{{ $barang->no_kode_barang }}</p>
                    </div>

                    <div class="border border-gray-200 rounded-md p-4 bg-gray-100">
                        <label class="block font-semibold text-gray-700 text-sm mb-1"><strong>Jumlah Barang:</strong></label>
                        <p class="text-sm text-gray-900">{{ $barang->jumlah_barang }}</p>
                    </div>

                    <div class="border border-gray-200 rounded-md p-4 bg-gray-100">
                        <label class="block font-semibold text-gray-700 text-sm mb-1"><strong>Harga Beli:</strong></label>
                        <p class="text-sm text-gray-900">{{ $barang->harga_beli }}</p>
                    </div>

                    <div class="border border-gray-200 rounded-md p-4 bg-gray-100">
                        <label class="block font-semibold text-gray-700 text-sm mb-1"><strong>Keadaan Barang:</strong></label>
                        <p class="text-sm text-gray-900">{{ $barang->keadaan_barang }}</p>
                    </div>

                    <div class="border border-gray-200 rounded-md p-4 bg-gray-100">
                        <label class="block font-semibold text-gray-700 text-sm mb-1"><strong>Ruangan:</strong></label>
                        <p class="text-sm text-gray-900">{{ $barang->ruangan->nama_ruangan }}</p>
                    </div>

                    <div class="border border-gray-200 rounded-md p-4 bg-gray-100">
                        <label class="block font-semibold text-gray-700 text-sm mb-1"><strong>Keterangan Mutasi:</strong></label>
                        <p class="text-sm text-gray-900">{{ $barang->keterangan_mutasi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="mt-6">
    <a href="{{ route('barangs.edit', $barang->id) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 text-sm ml-2">Edit</a>
        <a href="{{ route('barangs.label', $barang->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-sm">Cetak</a>
        <a href="{{ route('barangs.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-sm">Kembali</a>
    </div>

</div>
@endsection