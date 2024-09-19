@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="font-arial mb-6 font-extrabold text-3xl" style="color:#2284DF">
        DATA SATUAN KERJA
    </h1>

    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6">
        <form action="{{ route('unit_satuan_kerjas.update', $unitSatuanKerja->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Satuan Kerja -->
            <div class="flex flex-col">
                <label for="nama_satuan_kerja" class="text-gray-700 font-medium mb-2">Nama Satuan Kerja</label>
                <input type="text" name="nama_satuan_kerja" id="nama_satuan_kerja" class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300" value="{{ old('nama_satuan_kerja', $unitSatuanKerja->nama_satuan_kerja) }}" required>
            </div>

            <!-- Nama Kepala -->
            <div class="flex flex-col">
                <label for="nama_kepala" class="text-gray-700 font-medium mb-2">Nama Kepala</label>
                <input type="text" name="nama_kepala" id="nama_kepala" class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300" value="{{ old('nama_kepala', $unitSatuanKerja->nama_kepala) }}" required>
            </div>

            <!-- Deskripsi -->
            <div class="flex flex-col">
                <label for="deskripsi" class="text-gray-700 font-medium mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-300">{{ old('deskripsi', $unitSatuanKerja->deskripsi) }}</textarea>
            </div>

            <!-- Ruangan -->
            <div class="flex flex-col lg:flex-row lg:space-x-4">
                <!-- Ruangan Section -->
                <div id="ruangan-container" class="flex-grow bg-gray-50 p-4 border border-gray-200 rounded-lg">
                    <label class="text-gray-700 font-medium mb-2 block">Ruangan</label>
                    @foreach ($unitSatuanKerja->ruangans as $index => $ruangan)
                    <div class="flex items-center space-x-2 mb-2" id="ruangan-{{ $ruangan->id }}">
                        <input type="text" name="ruangan[{{ $index }}][nama_ruangan]" class="p-2 border border-gray-300 rounded-lg flex-grow" value="{{ old('ruangan.' . $index . '.nama_ruangan', $ruangan->nama_ruangan) }}" placeholder="Nama Ruangan" required>
                        <input type="hidden" name="ruangan[{{ $index }}][id]" value="{{ $ruangan->id }}">
                        <button type="button" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 btn-delete-ruangan" data-id="{{ $ruangan->id }}">Hapus</button>
                    </div>
                    @endforeach
                </div>

                <!-- Add Ruangan Button -->
                <div class="flex-shrink-0 flex items-center mt-4 lg:mt-0 lg:ml-4">
                    <button type="button" id="add-ruangan" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400">Tambah Ruangan</button>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-4 mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Update</button>
                <a href="{{ route('unit_satuan_kerjas.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400">Kembali</a>
            </div>
        </form>
    </div>
</div>

<!-- Script untuk dinamis ruangan dan hapus -->
<script>
    document.getElementById('add-ruangan').addEventListener('click', function() {
        const container = document.getElementById('ruangan-container');
        const index = container.children.length;
        const div = document.createElement('div');
        div.className = 'flex items-center space-x-2 mb-2';
        div.innerHTML = `<input type="text" name="ruangan[${index}][nama_ruangan]" class="p-2 border border-gray-300 rounded-lg flex-grow" placeholder="Nama Ruangan" required>
        <button type="button" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 btn-delete-ruangan">Hapus</button>`;
        container.appendChild(div);
    });

    // Delegasi event untuk tombol hapus
    document.getElementById('ruangan-container').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('btn-delete-ruangan')) {
            const ruanganElement = e.target.closest('.flex'); // Mendapatkan elemen parent yang ingin dihapus
            const ruanganId = e.target.getAttribute('data-id');

            if (confirm('Yakin ingin menghapus ruangan ini?')) {
                ruanganElement.remove();

                // Optional: Jika ruangan sudah ada di database, tambahkan input hidden untuk menandai penghapusan
                if (ruanganId) {
                    const deleteInput = document.createElement('input');
                    deleteInput.type = 'hidden';
                    deleteInput.name = 'delete_ruangan[]';
                    deleteInput.value = ruanganId;
                    document.querySelector('form').appendChild(deleteInput);
                }
            }
        }
    });
</script>

@endsection