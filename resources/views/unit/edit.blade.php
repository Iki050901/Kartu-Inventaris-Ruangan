@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 mt-5">

    <!-- Tombol Kembali -->
    <div class="mb-4">
        <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">DATA INSTANSI</h1>
    </div>

    <!-- Notifikasi Sukses -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 border border-green-300 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    

    <!-- Form Edit Unit dalam Card -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">Edit Instansi</h2>
        
        <form id="updateForm" action="{{ route('units.update', $unit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div class="form-group">
                    <label for="kantor" class="block text-gray-700">Nama Instansi:</label>
                    <input type="text" id="kantor" name="kantor" class="form-control border rounded w-full p-2" value="{{ $unit->kantor }}">
                    @error('kantor')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email_kantor" class="block text-gray-700">Email Instansi:</label>
                    <input type="email" id="email_kantor" name="email_kantor" class="form-control border rounded w-full p-2" value="{{ $unit->email_kantor }}">
                    @error('email_kantor')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="no_kode_lokasi" class="block text-gray-700">No. Kode Lokasi:</label>
                    <input type="text" id="no_kode_lokasi" name="no_kode_lokasi" class="form-control border rounded w-full p-2" value="{{ $unit->no_kode_lokasi }}">
                    @error('no_kode_lokasi')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat_kantor" class="block text-gray-700">Alamat Instansi:</label>
                    <input type="text" id="alamat_kantor" name="alamat_kantor" class="form-control border rounded w-full p-2" value="{{ $unit->alamat_kantor }}">
                    @error('alamat_kantor')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <h3 class="text-xl font-semibold mb-4">Kepala Instansi</h3>

            <h4 class="text-lg font-semibold mb-2">Pejabat 1</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div class="form-group">
                    <label for="kepala_dinas_pejabat_1" class="block text-gray-700">Nama:</label>
                    <input type="text" id="kepala_dinas_pejabat_1" name="kepala_dinas_pejabat_1" class="form-control border rounded w-full p-2" value="{{ $unit->kepala_dinas_pejabat_1 }}">
                    @error('kepala_dinas_pejabat_1')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jabatan_pejabat_1" class="block text-gray-700">Jabatan:</label>
                    <input type="text" id="jabatan_pejabat_1" name="jabatan_pejabat_1" class="form-control border rounded w-full p-2" value="{{ $unit->jabatan_pejabat_1 }}">
                    @error('jabatan_pejabat_1')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="nip_pejabat_1" class="block text-gray-700">NIP:</label>
                    <input type="text" id="nip_pejabat_1" name="nip_pejabat_1" class="form-control border rounded w-full p-2" value="{{ $unit->nip_pejabat_1 }}">
                    @error('nip_pejabat_1')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <h4 class="text-lg font-semibold mb-2">Pejabat 2</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div class="form-group">
                    <label for="kepala_dinas_pejabat_2" class="block text-gray-700">Nama:</label>
                    <input type="text" id="kepala_dinas_pejabat_2" name="kepala_dinas_pejabat_2" class="form-control border rounded w-full p-2" value="{{ $unit->kepala_dinas_pejabat_2 }}">
                    @error('kepala_dinas_pejabat_2')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jabatan_pejabat_2" class="block text-gray-700">Jabatan:</label>
                    <input type="text" id="jabatan_pejabat_2" name="jabatan_pejabat_2" class="form-control border rounded w-full p-2" value="{{ $unit->jabatan_pejabat_2 }}">
                    @error('jabatan_pejabat_2')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="nip_pejabat_2" class="block text-gray-700">NIP:</label>
                    <input type="text" id="nip_pejabat_2" name="nip_pejabat_2" class="form-control border rounded w-full p-2" value="{{ $unit->nip_pejabat_2 }}">
                    @error('nip_pejabat_2')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="flex space-x-4 mt-6">
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded shadow hover:bg-blue-700">Perbarui</button>
                <a href="{{ route('units.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded shadow hover:bg-gray-700">Batal</a>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript untuk redirect dan notifikasi -->
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah form submit default
        
        // Mengirim data form menggunakan Fetch API
        fetch(this.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams(new FormData(this)).toString()
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect ke halaman instansi dengan notifikasi sukses
                window.location.href = "{{ route('units.index') }}";
                alert('Instansi berhasil diperbarui!'); // Menampilkan notifikasi
            } else {
                alert('Terjadi kesalahan saat memperbarui data.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>

@endsection
