@extends('layouts.master')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">Data Instansi</h1>

    <!-- Notifikasi Sukses -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-300 text-green-700 p-4 rounded mb-4 flex items-center space-x-2 shadow-lg">
        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <span class="font-semibold">{{ session('success') }}</span>
    </div>
    @endif

    <!-- Notifikasi Error -->
    @if(session('error'))
    <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded mb-4 flex items-center space-x-2 shadow-lg">
        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
        <span class="font-semibold">{{ session('error') }}</span>
    </div>
    @endif

    <!-- Table for displaying units -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-x-auto">
        <div class="p-4">
            <div class="flex justify-between items-center mb-4">
                <!-- Dropdown Pilihan Row -->
                <div class="flex items-center border border-black rounded-lg">
                    <!-- Label -->
                    <label for="rows" class="px-4 py-2 text-white rounded-l-lg" style="background-color:#2284DF">ROWS</label>

                    <!-- Dropdown -->
                    <select id="rows" class="p-2 border-0 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                        @foreach([10] as $rowCount)
                        <option value="{{ $rowCount }}" {{ request('rows') == $rowCount ? 'selected' : '' }}>
                            {{ $rowCount }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Search form with icon -->
                <div class="flex-grow flex justify-center">
                    <div class="relative w-1/2">
                        <input type="text" id="search" placeholder="Search" value="{{ request('search') }}"
                            class="w-full p-2 pl-10 border border-blue-500 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        <svg class="absolute top-2.5 left-3 w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.65 6.65a7.5 7.5 0 016.5 6.5z" />
                        </svg>
                    </div>
                </div>

                <!-- Tombol Tambah -->
                <a href="{{ route('units.create') }}" class="flex justify-between items-center mb-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 5.5V19.5M5 12.5H19H5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="text-white">Tambah</span>
                </a>
            </div>

            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-gray-200" style="background-color:#A6CEF2">
                        <th class="py-2 px-4 text-left text-black">No.</th>
                        <th class="py-2 px-4 text-center text-black">Instansi</th>
                        <th class="py-2 px-4 text-left text-black">No. Kode Lokasi</th>
                        <th class="py-2 px-4 text-center text-black">Alamat</th>
                        <th class="py-2 px-4 text-center text-black">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($units as $index => $unit)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $index + 1 }}</td>
                        <td class="py-2 px-4">{{ $unit->kantor }}</td>
                        <td class="py-2 px-4">{{ $unit->no_kode_lokasi }}</td>
                        <td class="py-2 px-4">{{ $unit->alamat_kantor }}</td>
                        <td class="py-2 px-4 text-center">
                            <a href="{{ route('units.show', $unit->id) }}" class="bg-blue-500 text-white py-1 px-2 rounded shadow hover:bg-blue-600 text-sm">Lihat</a>
                            <a href="{{ route('units.edit', $unit->id) }}" class="bg-yellow-500 text-white py-1 px-2 rounded shadow hover:bg-yellow-600 text-sm ml-2">Edit</a>
                            <form action="{{ route('units.destroy', $unit->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-2 rounded shadow hover:bg-red-600 text-sm ml-2">Hapus</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <div class="p-4">
            {{ $units->links() }}
        </div>
    </div>

</div>

<!-- Script for auto-search -->
<script>
    function confirmDelete(event) {
        // Menghentikan pengiriman form jika konfirmasi batal
        if (!confirm('Apakah Anda yakin ingin menghapus unit ini?')) {
            event.preventDefault();
            return false;
        }
        // Jika konfirmasi ya, proses form dilanjutkan
        return true;
    }


    document.getElementById('search').addEventListener('input', function() {
        performSearch();
    });

    function performSearch() {
        const search = document.getElementById('search').value;
        const urlParams = new URLSearchParams(window.location.search);

        if (search) {
            urlParams.set('search', search);
        } else {
            urlParams.delete('search');
        }

        // Reload page with updated URL parameters
        window.location.search = urlParams.toString();
    }
</script>
@endsection