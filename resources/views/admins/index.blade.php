@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">
        DATA ADMIN
    </h1>

    
    <!-- Notifikasi jika berhasil -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        {{ session('success') }}
    </div>
    @endif
    
    <!-- Tabel daftar admin -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-x-auto">
        <div class="p-4">
            <!-- Tombol Tambah Admin -->
            <!-- <a href="{{ route('admins.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
                Tambah Admin
            </a> -->
        
            <!-- Form pencarian -->
            <!-- <div class="mb-4">
                <input type="text" id="search" placeholder="Cari Nama Admin" value="{{ request('search') }}" class="border p-2 rounded w-1/3">
            </div> -->
            <!-- fiturr fitur -->
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.65 6.65a7.5 7.5 0 016.5 6.5z"/>
                        </svg>
                    </div>
                </div>

                <!-- Tombol Tambah -->
                <a href="{{ route('admins.create') }}" class="flex justify-between items-center mb-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 5.5V19.5M5 12.5H19H5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-white">Tambah</span>
                </a>
            </div>
            <table class="min-w-full">
                <thead>
                    <tr class="bg-gray-100" style="background-color:#A6CEF2">
                        <th class="px-6 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Jabatan</th>
                        <th class="px-6 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Instansi</th>
                        <th class="px-6 py-2 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $index => $admin)
                    <tr class="border-b">
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $admin->user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $admin->jabatan }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $admin->user->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $admin->unit->kantor }}</td>
                        <td class="px-6 py-4 text-sm">
                            <a href="{{ route('admins.show', $admin->id) }}" class="bg-blue-500 text-white py-1 px-1 rounded shadow hover:bg-blue-600 text-sm">Lihat</a>
                            <a href="{{ route('admins.edit', $admin->id) }}" class="bg-yellow-500 text-white py-1 px-1 rounded shadow hover:bg-yellow-600 text-sm ml-2">Edit</a>
                            <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-1 rounded shadow hover:bg-red-600 text-sm ml-2">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $admins->links() }}
    </div>
</div>

<!-- Script untuk auto-search -->
<script>
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
