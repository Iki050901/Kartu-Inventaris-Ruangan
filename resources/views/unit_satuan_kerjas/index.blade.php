@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">
        UNIT SATUAN KERJA
    </h1>

    <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-x-auto">
        <div class="p-4">
            <!-- Flexbox for Search, Row Selection, and Add Button -->
            <div class="flex justify-between items-center mb-4">
                <!-- Dropdown Pilihan Row -->
                <div class="flex items-center border border-black rounded-lg">
                    <!-- Label -->
                    <label for="rows" class="px-4 py-2 text-white rounded-l-lg" style="background-color:#2284DF">ROWS</label>

                    <!-- Dropdown -->
                    <select id="rows" class="p-2 border-0 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-blue-300">
                        @foreach([10, 25, 50, 100] as $rowCount)
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

                <!-- Dropdown Pilihan Row dan Tombol Tambah di paling kanan -->
                <div class="flex-shrink-0 flex items-center space-x-4">

                    <!-- Tombol Tambah -->
                    <a href="{{ route('unit_satuan_kerjas.create') }}" class="flex justify-between items-center mb-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 5.5V19.5M5 12.5H19H5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="text-white">Tambah</span>
                    </a>
                </div>
            </div>

            <table class="min-w-full bg-white border border-gray-200">
                <thead style="background-color:#A6CEF2;">
                    <tr class="border-b">
                        <th class="py-2 px-4 text-left">Nama Satuan Kerja</th>
                        <th class="py-2 px-4 text-left">Deskripsi</th>
                        <th class="py-2 px-4 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody id="data-table">
                    @foreach($unitSatuanKerjas as $unitSatuanKerja)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $unitSatuanKerja->nama_satuan_kerja }}</td>
                        <td class="py-2 px-4 text-justify">{{ $unitSatuanKerja->deskripsi }}</td>
                        <td class="py-2 px-4 flex space-x-2">
                            <a href="{{ route('unit_satuan_kerjas.show', $unitSatuanKerja->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                Lihat
                            </a>
                            <a href="{{ route('unit_satuan_kerjas.edit', $unitSatuanKerja->id) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Edit
                            </a>
                            <form action="{{ route('unit_satuan_kerjas.destroy', $unitSatuanKerja->id) }}"
                                method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                    Hapus
                                </button>
                            </form>
                        </td
                            </tr>
                        @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="mt-6">
                {{ $unitSatuanKerjas->appends(request()->input())->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</div>

<!-- Script untuk auto-search dan row selection -->
<script>
    document.getElementById('search').addEventListener('input', function() {
        performSearch();
    });

    document.getElementById('rows').addEventListener('change', function() {
        performSearch();
    });

    function performSearch() {
        const search = document.getElementById('search').value;
        const rows = document.getElementById('rows').value;

        const urlParams = new URLSearchParams(window.location.search);

        if (search) {
            urlParams.set('search', search);
        } else {
            urlParams.delete('search');
        }

        if (rows) {
            urlParams.set('rows', rows);
        } else {
            urlParams.delete('rows');
        }

        // Reload page with updated URL parameters
        window.location.search = urlParams.toString();
    }
</script>
@endsection