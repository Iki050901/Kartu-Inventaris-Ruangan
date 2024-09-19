@extends('layouts.master')

@section('content')
<div class="container mx-auto mt-10 px-4">
    <h3 class="text-2xl font-bold text-center mb-6">Input Data Tanda Tangan</h3>
    <form action="{{ route('saveSignatureData') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="pejabat_1" class="block text-sm font-medium text-gray-700">Nama dan Jabatan Pejabat 1:</label>
            <input type="text" id="pejabat_1" name="pejabat_1" placeholder="Nama Pejabat 1" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            <input type="text" id="nip_1" name="nip_1" placeholder="NIP Pejabat 1" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            <input type="text" id="jabatan_1" name="jabatan_1" placeholder="Jabatan Pejabat 1" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
        </div>
        <div class="mb-4">
            <label for="pejabat_2" class="block text-sm font-medium text-gray-700">Nama dan Jabatan Pejabat 2:</label>
            <input type="text" id="pejabat_2" name="pejabat_2" placeholder="Nama Pejabat 2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            <input type="text" id="nip_2" name="nip_2" placeholder="NIP Pejabat 2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            <input type="text" id="jabatan_2" name="jabatan_2" placeholder="Jabatan Pejabat 2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan & Cetak</button>
        </div>
    </form>
</div>
@endsection