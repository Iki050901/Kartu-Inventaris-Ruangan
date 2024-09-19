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
            .btn, .no-print {
                display: none;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #e0f2fe; /* Biru muda untuk header */
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
    </style>
</head>
<body>
<div class="container mx-auto mt-5">
    <h3 class="text-2xl font-bold text-center mb-6">KARTU INVENTARIS RUANGAN</h3>
    <p>PROVINSI:  Jawa Barat</p>
    <p>KABUPATEN: Garut</p>
    <br>

    <!-- Tabel Laporan -->
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr>
                <th class="border border-black-300 px-4 py-2">No</th>
                <th class="border border-black-300 px-4 py-2">Nama/Jenis Barang</th>
                <th class="border border-black-300 px-4 py-2">Merk/Model</th>
                <th class="border border-black-300 px-4 py-2">No Seri Pabrik</th>
                <th class="border border-black-300 px-4 py-2">Ukuran</th>
                <th class="border border-black-300 px-4 py-2">Bahan</th>
                <th class="border border-black-300 px-4 py-2">Tahun Pembuatan/Pembelian</th>
                <th class="border border-black-300 px-4 py-2">No Kode Barang</th>
                <th class="border border-black-300 px-4 py-2">Jumlah Barang</th>
                <th class="border border-black-300 px-4 py-2">Harga Beli/Perolehan</th>
                <th class="border border-black-300 px-4 py-2">Keadaan Barang</th>
                <th class="border border-black-300 px-4 py-2">Keterangan Mutasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $index => $item)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ ($barangs->currentPage()-1) * $barangs->perPage() + $index + 1 }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->jenis_nama_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->merk_model }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->no_seri_pabrik }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->ukuran }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->bahan }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->tahun_pembuatan_pembelian }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->no_kode_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $item->jumlah_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-right">{{ number_format($item->harga_beli, 0, ',', '.') }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->keadaan_barang }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->keterangan_mutasi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tanda Tangan -->
    <div class="flex justify-between mt-10">
        <div class="text-center">
            <p class="signature-name">{{ $units->first()->kepala_dinas_pejabat_1 ?? 'Nama Pejabat 1' }}</p>
            <div class="signature"></div>
            <p>{{ $units->first()->nip_pejabat_1 ?? 'NIP Pejabat 1' }}</p>
        </div>
        <div class="text-center">
            <p class="signature-name">{{ $units->first()->kepala_dinas_pejabat_2 ?? 'Nama Pejabat 2' }}</p>
            <div class="signature"></div>
            <p>{{ $units->first()->nip_pejabat_2 ?? 'NIP Pejabat 2' }}</p>
        </div>
    </div>

    <!-- Tombol Print -->
    <div class="mt-5 text-center no-print">
        <button class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded" onclick="window.print()">Print Laporan</button>
    </div>
</div>
</body>
</html>
