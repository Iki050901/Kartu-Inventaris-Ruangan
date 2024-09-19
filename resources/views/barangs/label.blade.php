@extends('layouts.general')

@section('content')
<div class="container mx-auto py-8">
    <!-- Card Container -->
    <div class="max-w-sm mx-auto p-6 border border-gray-300 rounded-lg shadow-lg bg-white">
        <!-- Cetak Label Section -->
        <div class="mt-4 text-center">
            <p class="text-lg font-bold uppercase text-gray-700 pb-4" style="font-family: Arial;">Cetak Label Barang</p>
        </div>

        <!-- Inner Border (Combined for Logo, Title, and Details) -->
        <div id="print-area" class="bg-white p-4 rounded-lg border border-black" style="width: 100%; height: auto;">
            <!-- Header Section -->
            <div class="flex items-center mb-2">
                <!-- Logo Section -->
                <img src="{{ asset('img/Kabupaten garut.svg') }}" alt="Logo" class="w-12 h-12 mr-3"> <!-- Ganti path logo -->
                
                <!-- Title Section -->
                <h2 class="text-sm font-bold uppercase" style="font-family: Arial;">DINAS KOMUNIKASI DAN INFORMATIKA KABUPATEN GARUT</h2>
            </div>
            <!-- Divider -->
            <hr class="border-black mb-3">

            <!-- Details Section -->
            <div class="text-xs" style="font-family: Arial;">
                <table class="w-full">
                    <tr>
                        <td class="py-1"><strong>Jenis Barang / Nama Barang</strong></td>
                        <td class="py-1"><strong> :</strong></td>
                        <td class="py-1">{{ $barang->jenis_nama_barang }}</td>
                    </tr>
                    <tr>
                        <td class="py-1"><strong>Merk / Model</strong></td>
                        <td class="py-1"><strong> :</strong></td>
                        <td class="py-1">{{ $barang->merk_model }}</td>
                    </tr>
                    <tr>
                        <td class="py-1"><strong>No. Seri Pabrik</strong></td>
                        <td class="py-1"><strong>:</strong></td>
                        <td class="py-1">{{ $barang->no_seri_pabrik }}</td>
                    </tr>
                    <tr>
                        <td class="py-1"><strong>Tahun Pembuatan / Pembelian</strong></td>
                        <td class="py-1"><strong> :</strong></td>
                        <td class="py-1">{{ $barang->tahun_pembuatan_pembelian }}</td>
                    </tr>
                    <tr>
                        <td class="py-1"><strong>Tanggal Pencatatan</strong></td>
                        <td class="py-1"><strong> :</strong></td>
                        <td class="py-1">{{ $barang->tanggal_pencatatan }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Warning Section -->
        <div class="mt-2">
            <p class="text-xs italic text-red-600" style="font-family: Arial;">*Siapkan kertas label berukuran 570 x 400 mm untuk mencetak label barang</p>
        </div>

        <!-- Button Section -->
        <div class="mt-4 flex justify-end space-x-2">
            <a href="{{ route('barangs.show', $barang->id) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold text-xm py-1 px-2 rounded">
                Kembali
            </a>
            <a href="{{ route('barangs.print', $barang->id) }}" target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold text-xm py-1 px-2 rounded">
                Cetak
            </a>

        </div>
    </div>
</div>
@endsection
