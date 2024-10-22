<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Inventaris Ruangan - Print</title>
    <!-- Tambahkan CDN Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @media print {
            @page {
                size: auto;
                margin: 15mm;
            }

            /* Sembunyikan elemen tombol dan navigasi */
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
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #e0f2fe;
                /* Biru muda untuk header */
            }
        }

        /* Tetap menyesuaikan elemen saat tidak dalam mode print */
        .container {
            margin: 0 auto;
            max-width: 800px;
        }

        .signature {
            border-top: 1px solid black;
            margin-bottom: 5px;
            padding-top: 20px;
        }

        .signature-name {
            text-align: center;
            margin-bottom: 0;
        }

        .date-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .center-text {
            text-align: center;
        }

        .signature-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .signature-box {
            width: 48%;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container mx-auto mt-5">
        <h3 class="text-2xl font-bold text-center mb-6">KARTU INVENTARIS RUANGAN</h3>
        <p>PROVINSI : Jawa Barat</p>
        <p>KABUPATEN : Garut</p>
        <br>

        <!-- Tabel Laporan -->
        <table class="table-auto w-full border-collapse border border-black">
            <thead style="background-color:#A6CEF2">
                <tr>
                    <th rowspan="2" class="border border-black px-4 py-2">No</th>
                    <th rowspan="2" class="border border-black px-4 py-2">Nama Instansi</th>
                    <th rowspan="2" class="border border-black px-4 py-2">Jumlah Satuan Kerja</th>
                    <th rowspan="2" class="border border-black px-4 py-2">Jumlah Ruangan</th>
                    <th rowspan="2" class="border border-black px-4 py-2">Jumlah Barang</th>
                    <th colspan="3" class="border border-black px-4 py-2 text-center">Kondisi Barang</th>
                </tr>
                <tr>
                    <th class="border border-black px-4 py-2">Baik</th>
                    <th class="border border-black px-4 py-2">Kurang Baik</th>
                    <th class="border border-black px-4 py-2">Berat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($units as $index => $unit)
                <tr>
                    <td class="border border-black px-4 py-2 text-center">{{ $index + 1 }}</td>
                    <td class="border border-black px-4 py-2">{{ $unit->kantor }}</td>
                    <td class="border border-black px-4 py-2 text-center">{{ $unit->jumlah_unit_kerja }}</td>
                    <td class="border border-black px-4 py-2 text-center">{{ $unit->jumlah_ruangan }}</td>
                    <td class="border border-black px-4 py-2 text-center">{{ $unit->jumlah_barang }}</td>
                    <td class="border border-black px-4 py-2 text-center">{{ $unit->barang_baik }}</td>
                    <td class="border border-black px-4 py-2 text-center">{{ $unit->barang_kurang_baik }}</td>
                    <td class="border border-black px-4 py-2 text-center">{{ $unit->barang_buruk }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tanggal Cetak -->
        <div class="date-container">
            <p class="text-sm">Tanggal Cetak: <span id="printDate"></span></p>
        </div>

        <!-- Tanda Tangan -->
        <p class="center-text">Mengetahui</p>
        <div class="signature-container">
            <div class="signature-box">
                <p class="text-sm mb-0">{{ session('jabatan_1') ?? 'Jabatan Pejabat 1' }}</p>
                <p class="text-sm mb-12">Selaku Pengguna Barang</p>
                <div class="flex flex-col items-center relative">
                    <p class="font-bold text-sm mb-1 z-10 relative">{{ session('pejabat_1') ?? 'Nama Pejabat 1' }}</p>
                    <div class="border-t border-black w-2/3 mt-1"></div>
                    <p class="text-sm mt-1">NIP {{ session('nip_1') ?? 'NIP Pejabat 1' }}</p>
                </div>
            </div>
            <div class="signature-box">
                <p class="text-sm mb-0">{{ session('jabatan_2') ?? 'Jabatan Pejabat 2' }}</p>
                <p class="text-sm mb-12">Selaku pejabat penatausahaan Pengguna Barang</p>
                <div class="flex flex-col items-center relative">
                    <p class="font-bold text-sm mb-1 z-10 relative">{{ session('pejabat_2') ?? 'Nama Pejabat 2' }}</p>
                    <div class="border-t border-black w-2/3 mt-1"></div>
                    <p class="text-sm mt-1">NIP {{ session('nip_2') ?? 'NIP Pejabat 2' }}</p>
                </div>
            </div>
        </div>

        <!-- Tombol Print -->
        <div class="mt-5 text-center no-print">
            <button class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded" onclick="window.print()">Print Laporan</button>
        </div>
    </div>

    <script>
        // Fungsi untuk format tanggal
        function formatDate(date) {
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            return date.toLocaleDateString('id-ID', options);
        }

        // Menampilkan tanggal cetak
        document.addEventListener('DOMContentLoaded', function() {
            const printDateElement = document.getElementById('printDate');
            const today = new Date();
            printDateElement.textContent = formatDate(today);
        });
    </script>
</body>

</html>