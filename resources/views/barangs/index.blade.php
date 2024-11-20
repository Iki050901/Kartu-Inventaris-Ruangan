@extends('layouts.general')

@section('content')
<div class="container mx-auto px-4 mt-5">

    <!-- Card Summary Barang -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Barang -->
        <div class="bg-blue-500 text-white p-4 rounded-lg shadow-lg">
            <a href="{{ route('barangs.index') }}">
                <div class="card-body cursor-pointer">
                    <h5 class="text-lg font-semibold">Total Barang</h5>
                    <p class="text-2xl font-bold">{{ $totalBarang }} barang</p>
                </div>
            </a>
        </div>
        <div class="bg-green-500 text-white p-4 rounded-lg shadow-lg">
            <a href="{{ route('barangs.index', ['keadaan_barang' => 'Baik']) }}">
                <div class="card-body">
                    <h5 class="text-lg font-semibold">Barang Baik</h5>
                    <p class="text-2xl font-bold">{{ $jumlahBaik }} barang</p>
                </div>
            </a>
        </div>
        <div class="bg-yellow-500 text-white p-4 rounded-lg shadow-lg">
            <a href="{{ route('barangs.index', ['keadaan_barang' => 'Kurang_Baik']) }}">
                <div class="card-body">
                    <h5 class="text-lg font-semibold">Barang Kurang Baik</h5>
                    <p class="text-2xl font-bold">{{ $jumlahKurangBaik }} barang</p>
                </div>
            </a>
        </div>
        <div class="bg-red-500 text-white p-4 rounded-lg shadow-lg">
            <a href="{{ route('barangs.index', ['keadaan_barang' => 'Rusak']) }}">
                <div class="card-body">
                    <h5 class="text-lg font-semibold">Barang Rusak</h5>
                    <p class="text-2xl font-bold">{{ $jumlahRusak }} barang</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Pencarian Nama Barang, Pilih Ruangan, dan Tombol Aksi -->
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between space-y-4 sm:space-y-0">
        <!-- Form Pencarian -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 w-full sm:w-auto">
            <input type="text" id="search" name="search" placeholder="Cari Nama Barang" value="{{ request('search') }}" class="border p-2 rounded w-full sm:w-auto">
            <select id="ruangan_id" name="ruangan_id" class="border p-2 rounded w-full sm:w-auto">
                <option value="">Pilih Ruangan</option>
                @foreach($ruangans as $ruangan)
                <option value="{{ $ruangan->id }}" {{ request('ruangan_id') == $ruangan->id ? 'selected' : '' }}>{{ $ruangan->nama_ruangan }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tombol Tambah dan Print Laporan -->
        <div class="flex space-x-3">
            <a href="{{ route('barangs.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded shadow hover:bg-blue-700">Tambah Barang</a>
            <a href="{{ route('print.barang') }}" target="_blank" class="bg-indigo-600 text-white py-2 px-4 rounded shadow hover:bg-indigo-700">Print Laporan</a>
        </div>
    </div>

    <!-- Tabel Laporan Barang -->
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border border-gray-300 px-4 py-2 text-center">No</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Jenis/Nama Barang</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Merk/Model</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Ruangan</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Jumlah Barang</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Kondisi Barang</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangs as $index => $barang)
                <tr class="bg-white hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ ($barangs->currentPage()-1) * $barangs->perPage() + $index + 1 }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $barang->jenis_nama_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $barang->merk_model }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $barang->ruangan->nama_ruangan }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $barang->jumlah_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $barang->keadaan_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a href="{{ route('barangs.show', $barang->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Lihat</a>
                        <a href="{{ route('barangs.edit', $barang->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                        <button type="button" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" onclick="confirmDeletion({{ $barang->id }})">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-between mt-4">
            <div>Menampilkan {{ $barangs->count() }} dari {{ $barangs->total() }} data</div>
            <div>{{ $barangs->appends(request()->query())->links() }}</div>
        </div>
    </div>
</div>

<!-- Script untuk auto-search -->
<script>
    document.getElementById('search').addEventListener('input', function() {
        performSearch();
    });

    document.getElementById('ruangan_id').addEventListener('change', function() {
        performSearch();
    });

    function performSearch() {
        const search = document.getElementById('search').value;
        const ruanganId = document.getElementById('ruangan_id').value;

        const urlParams = new URLSearchParams(window.location.search);

        if (search) {
            urlParams.set('search', search);
        } else {
            urlParams.delete('search');
        }

        if (ruanganId) {
            urlParams.set('ruangan_id', ruanganId);
        } else {
            urlParams.delete('ruangan_id');
        }

        // Reload page with updated URL parameters
        window.location.search = urlParams.toString();
    }
</script>

<!-- Tambahkan SweetAlert dan script konfirmasi hapus -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDeletion(barangId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Barang akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Buat form untuk mengirimkan delete request
                const form = document.createElement('form');
                form.action = `/barangs/${barangId}`;
                form.method = 'POST';
                
                // Tambahkan CSRF token
                const csrfField = document.createElement('input');
                csrfField.type = 'hidden';
                csrfField.name = '_token';
                csrfField.value = '{{ csrf_token() }}';
                form.appendChild(csrfField);

                // Tambahkan metode DELETE
                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                form.appendChild(methodField);

                // Tambahkan form ke body dan submit
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endsection
