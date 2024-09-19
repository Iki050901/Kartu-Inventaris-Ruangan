<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang - Print</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @media print {
            @page {
                size: auto;
                margin: 8mm;
            }

            .btn,
            .no-print {
                display: none;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                border: 1px solid black;
                padding: 2px;
                text-align: left;
                font-size: 8px;
            }

            th {
                background-color: #e0f2fe;
            }
        }

        .container {
            margin: 0 auto;
            max-width: 95%;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            table-layout: fixed;
            width: 100%;
        }

        th,
        td {
            word-wrap: break-word;
        }

        th {
            font-size: 9px;
            text-align: center;
        }

        td {
            font-size: 8px;
            padding: 3px;
            text-align: center;
        }

        .checkmark {
            font-weight: bold;
            color: green;
        }
    </style>
    <script>
        function onChangeRuanganDropdown() {
            var ruanganId = document.getElementById("ruangan_id").value;
            window.location.href = "{{ route('print.barang') }}?ruangan_id=" + ruanganId;
        }

        function formatDate(date) {
            const options = { day: '2-digit', month: 'long', year: 'numeric' };
            return date.toLocaleDateString('id-ID', options);
        }

        window.onload = function() {
            const dateElement = document.getElementById('tanggal');
            const today = new Date();
            dateElement.textContent = `Garut, ${formatDate(today)}`;
        };
    </script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-5">
        <h3 class="text-lg font-bold text-center mb-4">Laporan Barang</h3>

        <!-- Dropdown Pilih Ruangan -->
        <div class="mb-4 no-print">
            <label for="ruangan_id" class="block mb-2">Pilih Ruangan:</label>
            <select id="ruangan_id" class="border p-2 rounded w-full mb-4" onchange="onChangeRuanganDropdown()">
                <option value="">Pilih Ruangan</option>
                @foreach($ruangans as $r)
                <option value="{{ $r->id }}" {{ $ruangan && $ruangan->id == $r->id ? 'selected' : '' }}>{{ $r->nama_ruangan }}</option>
                @endforeach
            </select>
        </div>

        @if($ruangan && $unit)
        <p>PROVINSI: Jawa Barat</p>
        <p>KABUPATEN: Garut</p>
        <p>No Kode Lokasi: {{ $unit->no_kode_lokasi }}</p>
        <p>Unit: {{ $unit->kantor }}</p>
        <p>Satuan Kerja: {{ $unitKerja->nama_satuan_kerja }}</p>
        <p>Ruangan: {{ $ruangan->nama_ruangan }}</p>
        <br>

        <div class="table-container">
            <!-- Tabel Laporan -->
            <table class="table-auto border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th rowspan="2" class="border border-black-300 px-1 py-1">No</th>
                        <th rowspan="2" class="border border-black-300 px-1 py-1">Nama/Jenis Barang</th>
                        <th rowspan="2" class="border border-black-300 px-1 py-1">Merk/Model</th>
                        <th rowspan="2" class="border border-black-300 px-1 py-1">No Seri Pabrik</th>
                        <th rowspan="2" class="border border-black-300 px-1 py-1">Ukuran</th>
                        <th rowspan="2" class="border border-black-300 px-1 py-1">Bahan</th>
                        <th rowspan="2" class="border border-black-300 px-1 py-1">Tahun Pembuatan/Pembelian</th>
                        <th rowspan="2" class="border border-black-300 px-1 py-1">No Kode Barang</th>
                        <th rowspan="2" class="border border-black-300 px-1 py-1">Jumlah</th>
                        <th rowspan="2" class="border border-black-300 px-1 py-1">Harga Beli/Perolehan</th>
                        <th colspan="3" class="border border-black-300 px-1 py-1">Keadaan Barang</th>
                        <th rowspan="2" class="border border-black-300 px-1 py-1">Keterangan Mutasi</th>
                    </tr>
                    <tr>
                        <th class="border border-black-300 px-1 py-1">Baik</th>
                        <th class="border border-black-300 px-1 py-1">Kurang Baik</th>
                        <th class="border border-black-300 px-1 py-1">Rusak</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangs as $index => $item)
                    <tr>
                        <td class="border border-black-300 px-1 py-1 text-center">{{ $index + 1 }}</td>
                        <td class="border border-black-300 px-1 py-1">{{ $item->jenis_nama_barang }}</td>
                        <td class="border border-black-300 px-1 py-1">{{ $item->merk_model }}</td>
                        <td class="border border-black-300 px-1 py-1">{{ $item->no_seri_pabrik }}</td>
                        <td class="border border-black-300 px-1 py-1">{{ $item->ukuran }}</td>
                        <td class="border border-black-300 px-1 py-1">{{ $item->bahan }}</td>
                        <td class="border border-black-300 px-1 py-1">{{ $item->tahun_pembuatan_pembelian }}</td>
                        <td class="border border-black-300 px-1 py-1">{{ $item->no_kode_barang }}</td>
                        <td class="border border-black-300 px-1 py-1 text-center">{{ $item->jumlah_barang }}</td>
                        <td class="border border-black-300 px-1 py-1 text-right">{{ number_format($item->harga_beli, 0, ',', '.') }}</td>

                        <!-- Ceklis keadaan barang -->
                        <td class="border border-black-300 px-1 py-1">@if($item->keadaan_barang == 'baik')✔@endif</td>
                        <td class="border border-black-300 px-1 py-1">@if($item->keadaan_barang == 'kurang baik')✔@endif</td>
                        <td class="border border-black-300 px-1 py-1">@if($item->keadaan_barang == 'buruk')✔@endif</td>

                        <td class="border border-black-300 px-1 py-1">{{ $item->keterangan_mutasi }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tanda Tangan -->
        <div class="flex justify-between mt-10">
            <div class="w-1/2 text-center">
                <p class="italic text-sm mb-4">Mengetahui,</p>
                <p class="font-bold text-sm mb-4">{{ $unit->first()->jabatan_pejabat_1 ?? 'Jabatan Pejabat 1' }}</p>
                <br><br><br>
                <div class="flex flex-col items-center relative">
                    <p class="font-bold text-sm mb-1 z-10 relative">{{ $unit->first()->kepala_dinas_pejabat_1 ?? 'Nama Pejabat 1' }}</p>
                    <div class="border-t border-black w-2/3 mt-1"></div>
                    <p class="text-sm mt-1">{{ $unit->first()->nip_pejabat_1 ?? 'NIP Pejabat 1' }}</p>
                </div>
            </div>
            <div class="w-1/2 text-center">
                <p class="italic text-sm mb-4" id="tanggal"></p>
                <p class="font-bold text-sm mb-4">{{ $unit->first()->jabatan_pejabat_2 ?? 'Jabatan Pejabat 2' }}</p>
                <br><br><br>
                <div class="flex flex-col items-center relative">
                    <p class="font-bold text-sm mb-1 z-10 relative">{{ $unit->first()->kepala_dinas_pejabat_2 ?? 'Nama Pejabat 2' }}</p>
                    <div class="border-t border-black w-2/3 mt-1"></div>
                    <p class="text-sm mt-1">{{ $unit->first()->nip_pejabat_2 ?? 'NIP Pejabat 2' }}</p>
                </div>
            </div>
        </div>
                <!-- Tombol Print -->
                <div class="mt-4 text-center no-print">
            <button class="btn btn-primary bg-blue-500 text-white px-3 py-2 rounded" onclick="window.print()">Print Laporan</button>
        </div>
        @else
        <p class="text-center">Pilih ruangan untuk menampilkan laporan barang.</p>
        
        @endif
    </div>
</body>

</html>
