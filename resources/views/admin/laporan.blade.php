@extends('layouts.admin')

@section('content')
<div class="container mx-auto mt-5 px-4">
    <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">
        LAPORAN
    </h1>
    <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-x-auto">
        <div class="p-4">
            <!-- Pencarian dan Filter -->
            <div class="mb-4 flex flex-col md:flex-row items-center gap-4">
                
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
                
                <!-- Tombol Print -->
                <a href="{{ route('print.barang') }}" target="_blank" class="px-4 py-2 rounded-md flex-shrink-0 ml-auto">
                    <svg width="46" height="45" viewBox="0 0 46 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="0.5" width="45" height="45" rx="10" fill="#63A8E9"/>
                        <g clip-path="url(#clip0_4016_5811)">
                            <path d="M30.0002 14.5C30.0002 13.4391 29.5787 12.4217 28.8286 11.6716C28.0784 10.9214 27.061 10.5 26.0002 10.5H20.0002C18.9393 10.5 17.9219 10.9214 17.1717 11.6716C16.4216 12.4217 16.0002 13.4391 16.0002 14.5V15.5H30.0002V14.5Z" fill="white"/>
                            <path d="M27.0002 25.5H19.0002C17.3433 25.5 16.0002 26.8431 16.0002 28.5V31.5C16.0002 33.1569 17.3433 34.5 19.0002 34.5H27.0002C28.657 34.5 30.0002 33.1569 30.0002 31.5V28.5C30.0002 26.8431 28.657 25.5 27.0002 25.5Z" fill="white"/>
                            <path d="M30 17.5H16C14.6744 17.5016 13.4036 18.0289 12.4662 18.9662C11.5289 19.9036 11.0016 21.1744 11 22.5V26.5C11.0013 27.4718 11.2857 28.4221 11.8185 29.2348C12.3513 30.0475 13.1094 30.6873 14 31.076V28.5C14.0016 27.1744 14.5289 25.9036 15.4662 24.9662C16.4036 24.0289 17.6744 23.5016 19 23.5H27C28.3256 23.5016 29.5964 24.0289 30.5338 24.9662C31.4711 25.9036 31.9984 27.1744 32 28.5V31.076C32.8906 30.6873 33.6487 30.0475 34.1815 29.2348C34.7143 28.4221 34.9987 27.4718 35 26.5V22.5C34.9984 21.1744 34.4711 19.9036 33.5338 18.9662C32.5964 18.0289 31.3256 17.5016 30 17.5ZM29 21.5H27C26.7348 21.5 26.4804 21.3946 26.2929 21.2071C26.1053 21.0196 26 20.7652 26 20.5C26 20.2348 26.1053 19.9804 26.2929 19.7929C26.4804 19.6054 26.7348 19.5 27 19.5H29C29.2652 19.5 29.5196 19.6054 29.7071 19.7929C29.8946 19.9804 30 20.2348 30 20.5C30 20.7652 29.8946 21.0196 29.7071 21.2071C29.5196 21.3946 29.2652 21.5 29 21.5Z" fill="white"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_4016_5811">
                                <rect width="24" height="24" fill="white" transform="translate(11 10.5)"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>

            <!-- Tabel Laporan -->
            <div class="rounded-lg shadow-sm mt-4">
                <table class="table-auto w-full">
                    <thead style="background-color:#A6CEF2;">
                        <tr>
                            <th class="border-r border-t border-black px-4 py-2 text-left">No</th>
                            <th class="border-r border-l border-t border-black px-4 py-2 text-left">Nama Satuan Kerja</th>
                            <th class="border-r border-l border-t border-black px-4 py-2 text-left">Jumlah Ruangan</th>
                            <th class="border-r border-l border-t border-black px-4 py-2 text-left">Jumlah Barang</th>
                            <th colspan="3" class="border-l border-t border-b border-black px-4 py-2 text-center align-middle">
                                Keadaan Barang
                            </th>
                        </tr>
                        <tr>
                            <th class="border-r border-b border-black px-4 py-2"></th>
                            <th class="border-r border-l border-b border-black px-4 py-2"></th>
                            <th class="border-r border-l border-b border-black px-4 py-2"></th>
                            <th class="border-r border-l border-b border-black px-4 py-2"></th>
                            <th class="border border-black px-4 py-2 text-center">Baik</th>
                            <th class="border border-black px-4 py-2 text-center">Kurang Baik</th>
                            <th class="border-l border-t border-b border-black px-4 py-2 text-center">Rusak</th>
                        </tr>
                    </thead>
                    <tbody id="unit-data">
                        @foreach($unitsQuery as $index => $unit)
                        <tr>
                            <td class="border-r border-b border-black px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="border border-black px-4 py-2">{{ $unit->nama_satuan_kerja }}</td>
                            <td class="border border-black px-4 py-2 text-center">{{ $unit->jumlah_ruangan }}</td>
                            <td class="border border-black px-4 py-2 text-center">{{ $unit->jumlah_barang }}</td>
                            <td class="border border-black px-4 py-2 text-center">{{ $unit->barang_baik }}</td>
                            <td class="border border-black px-4 py-2 text-center">{{ $unit->barang_kurang_baik }}</td>
                            <td class="border-l border-t border-b border-black px-4 py-2 text-center">{{ $unit->barang_buruk }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Script untuk auto-search dan row selection -->
<script>
    document.getElementById('search').addEventListener('input', function() {
        performSearch();
    });

    function performSearch() {
        const search = document.getElementById('search').value;
        // const rows = document.getElementById('rows').value;

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
@endpush
