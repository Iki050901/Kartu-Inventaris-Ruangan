@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">DATA PEGAWAI</h1>


    <div class="bg-white border border-gray-200 rounded-lg shadow-md p-4 mb-6">
        <!-- Flexbox for Search and Add Button -->
        <div class="flex justify-between items-center mb-4">
            <!-- Input Pencarian -->
            <div class="flex-grow">
                <input type="text" id="search" class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-300" placeholder="Cari Nama Pegawai" value="{{ request('search') }}">
            </div>

            <!-- Tombol Tambah -->
            <a href="{{ route('data_pegawais.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600 ml-4">Tambah Pegawai</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="bg-green-100 text-green-700 border border-green-300 p-4 rounded-lg mb-4">{{ $message }}</div>
        @endif

        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead style="background-color:#A6CEF2">
                <tr class="border-b">
                    <th class="py-2 px-4 text-left text-gray-800">Nama</th>
                    <th class="py-2 px-4 text-left text-gray-800">Email</th>
                    <th class="py-2 px-4 text-left text-gray-800">Unit Satuan Kerja</th>
                    <th class="py-2 px-4 text-left text-gray-800">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPegawais as $pegawai)
                    <tr class="border-b">
                        <td class="py-2 px-4 text-gray-800">{{ $pegawai->user->name }}</td>
                        <td class="py-2 px-4 text-gray-800">{{ $pegawai->user->email }}</td>
                        <td class="py-2 px-4 text-gray-800">{{ $pegawai->unitSatuanKerja->nama_satuan_kerja }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('data_pegawais.show', $pegawai->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg shadow hover:bg-yellow-600">Lihat</a>
                            <a href="{{ route('data_pegawais.edit', $pegawai->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-lg shadow hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('data_pegawais.destroy', $pegawai->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg shadow hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $dataPegawais->links('pagination::tailwind') }}
        </div>
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
