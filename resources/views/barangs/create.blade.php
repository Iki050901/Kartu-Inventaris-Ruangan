@extends('layouts.general')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tambah Barang</h1>

    <!-- Informasi Unit -->
    <div class="mb-4 p-4 border border-gray-300 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold mb-3">Informasi Unit</h3>
        <p class="text-sm mb-2"><strong>No Kode Lokasi Unit:</strong> {{ $unit->no_kode_lokasi }}</p>
        <p class="text-sm mb-2"><strong>Unit:</strong> {{ $unit->kantor }}</p>
        <p class="text-sm mb-2"><strong>Unit Satuan Kerja:</strong> {{ $unitSatuanKerja->nama_satuan_kerja }}</p>
    </div>

    <!-- Form Tambah Barang -->
    <div class="border border-gray-300 rounded-lg shadow-md p-4">
        <form action="{{ route('barangs.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kolom Kiri -->
                <div class="space-y-4">
                    @foreach([
                        'tanggal_pencatatan' => ['Tanggal Pencatatan', 'date', old('tanggal_pencatatan')],
                        'jenis_nama_barang' => ['Jenis/Nama Barang', 'text', old('jenis_nama_barang')],
                        'merk_model' => ['Merk/Model', 'text', old('merk_model')],
                        'no_seri_pabrik' => ['No Seri Pabrik', 'text', old('no_seri_pabrik')],
                        'ukuran' => ['Ukuran', 'text', old('ukuran')],
                        'bahan' => ['Bahan', 'text', old('bahan')]
                    ] as $name => [$label, $type, $value])
                    <div class="border border-gray-200 rounded-md p-4">
                        <label for="{{ $name }}" class="block font-semibold text-gray-700 text-sm mb-1"><strong>{{ $label }}:</strong></label>
                        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control border border-gray-300 rounded-md p-2 w-full" value="{{ $value }}" {{ $type === 'text' ? 'required' : '' }}>
                    </div>
                    @endforeach
                </div>

                <!-- Kolom Kanan -->
                <div class="space-y-4">
                    @foreach([
                        'tahun_pembuatan_pembelian' => ['Tahun Pembuatan/Pembelian', 'number', old('tahun_pembuatan_pembelian')],
                        'no_kode_barang' => ['No Kode Barang', 'text', old('no_kode_barang')],
                        'jumlah_barang' => ['Jumlah Barang', 'text', old('jumlah_barang')],
                        'harga_beli' => ['Harga Beli', 'number', old('harga_beli')],
                        'keadaan_barang' => ['Keadaan Barang', 'select', old('keadaan_barang')],
                        'ruangan_id' => ['Ruangan', 'select', old('ruangan_id')],
                        'keterangan_mutasi' => ['Keterangan Mutasi', 'textarea', old('keterangan_mutasi')]
                    ] as $name => [$label, $type, $value])
                    <div class="border border-gray-200 rounded-md p-4">
                        <label for="{{ $name }}" class="block font-semibold text-gray-700 text-sm mb-1"><strong>{{ $label }}:</strong></label>
                        @if($type === 'select')
                            @if($name === 'keadaan_barang')
                                <select name="{{ $name }}" id="{{ $name }}" class="form-control border border-gray-300 rounded-md p-2 w-full">
                                    <option value="baik" {{ $value == 'baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="kurang_baik" {{ $value == 'kurang_baik' ? 'selected' : '' }}>Kurang Baik</option>
                                    <option value="rusak" {{ $value == 'rusak' ? 'selected' : '' }}>Rusak</option>
                                </select>
                            @else
                                <select name="{{ $name }}" id="{{ $name }}" class="form-control border border-gray-300 rounded-md p-2 w-full" required>
                                    @foreach($ruangans as $ruangan)
                                        <option value="{{ $ruangan->id }}" {{ $value == $ruangan->id ? 'selected' : '' }}>
                                            {{ $ruangan->nama_ruangan }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif
                        @elseif($type === 'textarea')
                            <textarea name="{{ $name }}" id="{{ $name }}" class="form-control border border-gray-300 rounded-md p-2 w-full">{{ $value }}</textarea>
                        @else
                            <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control border border-gray-300 rounded-md p-2 w-full" value="{{ $value }}" {{ $type === 'text' ? 'required' : '' }}>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-4 flex space-x-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
                <a href="{{ route('barangs.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
