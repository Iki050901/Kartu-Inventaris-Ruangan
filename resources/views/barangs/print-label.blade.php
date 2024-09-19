<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Label Barang</title>
    <!-- Link Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @media print {
            @page {
                size: 570mm 400mm;
                margin: 0;
            }
            body {
                margin: 0;
            }
            .print-container {
                width: 570mm; /* Full width of the page */
                height: 400mm; /* Full height of the page */
                margin: 0;
                padding: 50mm; /* Slight padding */
                border: 1px solid black;
                border-radius: 8px;
                background: white;
                box-sizing: border-box;
            }
            .header-logo {
                width: 60mm; /* Smaller logo size */
                height: 60mm;
            }
            .header-title {
                font-size: 50pt; /* Adjusted font size for the title */
                line-height: 1.2; /* Adjust line height */
                margin: 0; /* Remove margin */
            }
            .detail-table td {
                font-size: 40pt; /* Adjusted font size for table content */
                padding: 18mm 0; /* Increased spacing between rows */
            }
        }
    </style>
</head>
<body class="font-sans bg-gray-100">
    <div class="print-container mx-auto bg-white">
        <!-- Header Section -->
        <div class="flex items-center mb-4">
            <img src="{{ asset('img/Kabupaten garut.svg') }}" alt="Logo" class="header-logo mr-4">
            <h5 class="header-title font-bold uppercase">DINAS KOMUNIKASI DAN INFORMATIKA KABUPATEN GARUT</h5>
        </div>
        <hr class="border-black mb-4">

        <!-- Detail Barang Section -->
        <div class="text-lg detail-table">
            <table class="w-full border-collapse">
                <tr>
                    <td class="py-2 font-semibold text-left">Jenis Barang / Nama Barang</td>
                    <td class="py-2 text-left">:</td>
                    <td class="py-2 text-left">{{ $barang->jenis_nama_barang }}</td>
                </tr>
                <tr>
                    <td class="py-2 font-semibold text-left">Merk / Model</td>
                    <td class="py-2 text-left">:</td>
                    <td class="py-2 text-left">{{ $barang->merk_model }}</td>
                </tr>
                <tr>
                    <td class="py-2 font-semibold text-left">No. Seri Pabrik</td>
                    <td class="py-2 text-left">:</td>
                    <td class="py-2 text-left">{{ $barang->no_seri_pabrik }}</td>
                </tr>
                <tr>
                    <td class="py-2 font-semibold text-left">Tahun Pembuatan / Pembelian</td>
                    <td class="py-2 text-left">:</td>
                    <td class="py-2 text-left">{{ $barang->tahun_pembuatan_pembelian }}</td>
                </tr>
                <tr>
                    <td class="py-2 font-semibold text-left">Tanggal Pencatatan</td>
                    <td class="py-2 text-left">:</td>
                    <td class="py-2 text-left">{{ $barang->tanggal_pencatatan }}</td>
                </tr>
            </table>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
