@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">
        UNIT SATUAN KERJA
    </h1>

    <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-x-auto">
        <div class="p-4">
            <form action="{{ route('unit_satuan_kerjas.store') }}" method="POST" class="space-y-8">
                @csrf
                
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Form Bagian Kiri -->
                    <div class="flex-1 space-y-4">
                        <!-- Nama Satuan Kerja -->
                        <div class="flex flex-col">
                            <label for="nama_satuan_kerja" class="text-gray-700 mb-1 font-medium">Nama Satuan Kerja:</label>
                            <input type="text" name="nama_satuan_kerja" id="nama_satuan_kerja" class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300" required>
                        </div>
                        
                        <!-- Nama Kepala -->
                        <div class="flex flex-col">
                            <label for="nama_kepala" class="text-gray-700 mb-1 font-medium">Nama Kepala:</label>
                            <input type="text" name="nama_kepala" id="nama_kepala" class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300" required>
                        </div>
                        
                        <!-- Deskripsi -->
                        <div class="flex flex-col">
                            <label for="deskripsi" class="text-gray-700 mb-1 font-medium">Deskripsi:</label>
                            <textarea name="deskripsi" id="deskripsi" class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300" rows="4" required></textarea>
                        </div>
                    </div>
                    
                    <!-- Form Bagian Kanan -->
                    <div class="w-full md:w-80 space-y-4">
                        <!-- Ruangan -->
                        <div id="ruangans" class="space-y-2">
                            <h5 class="text-xl font-semibold mb-2">Daftar Ruangan</h5>
                            <div class="flex flex-col">
                                <input type="text" name="ruangans[]" class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300" placeholder="Nama Ruangan" required>
                            </div>
                        </div>
                        
                        <!-- Button untuk menambahkan ruangan -->
                        <button type="button" id="add-ruangan" class="bg-gray-300 text-gray-800 p-2 rounded-lg hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-300 w-full">+ Ruangan</button>
                    </div>
                </div>

                <!-- Submit and Back buttons -->
                <div class="flex flex-col gap-2 mt-4">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 w-full">Simpan</button>
                    <a href="{{ route('unit_satuan_kerjas.index') }}" class="bg-gray-500 text-white p-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 w-full text-center">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('add-ruangan').addEventListener('click', function() {
        const div = document.createElement('div');
        div.classList.add('flex', 'flex-col', 'space-y-2');
        div.innerHTML = '<input type="text" name="ruangans[]" class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300" placeholder="Nama Ruangan" required>';
        document.getElementById('ruangans').appendChild(div);
    });
</script>

@endsection
