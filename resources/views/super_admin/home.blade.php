@extends('layouts.master')

@section('content')
<div class="flex">
    <!-- Konten Utama -->
    <div class="flex-grow p-4">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">
                        DASHBOARD
                    </h1>
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Total Kantor -->
                <a href="{{ route('units.index') }}" class="block">
                    <div class="bg-white text-black p-1 rounded-lg shadow-lg">
                        <div class="card-body">
                            <div class="flex items-center gap-6">
                                <!-- Icon dan Informasi Total Instansi -->
                                <svg width="97" height="101" viewBox="0 0 97 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="1" y="1" width="95" height="99" rx="9" fill="#2284DF" />
                                    <rect x="1" y="1" width="95" height="99" rx="9" stroke="white" stroke-width="2" />
                                    <g clip-path="url(#clip0_4030_9185)">
                                        <path d="M46.4167 25.5H29.75C28.0924 25.5 26.5027 26.1585 25.3306 27.3306C24.1585 28.5027 23.5 30.0924 23.5 31.75V75.5H52.6667V31.75C52.6667 30.0924 52.0082 28.5027 50.8361 27.3306C49.664 26.1585 48.0743 25.5 46.4167 25.5V25.5ZM36 65.0833H29.75V60.9167H36V65.0833ZM36 56.75H29.75V52.5833H36V56.75ZM36 48.4167H29.75V44.25H36V48.4167ZM36 40.0833H29.75V35.9167H36V40.0833ZM46.4167 65.0833H40.1667V60.9167H46.4167V65.0833ZM46.4167 56.75H40.1667V52.5833H46.4167V56.75ZM46.4167 48.4167H40.1667V44.25H46.4167V48.4167ZM46.4167 40.0833H40.1667V35.9167H46.4167V40.0833ZM67.25 35.9167H56.8333V75.5H73.5V42.1667C73.5 40.5091 72.8415 38.9194 71.6694 37.7472C70.4973 36.5751 68.9076 35.9167 67.25 35.9167ZM67.25 65.0833H63.0833V60.9167H67.25V65.0833ZM67.25 56.75H63.0833V52.5833H67.25V56.75ZM67.25 48.4167H63.0833V44.25H67.25V48.4167Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4030_9185">
                                            <rect width="50" height="50" fill="white" transform="translate(23.5 25.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>

                                <div>
                                    <h5 class="text-lg font-semibold">Total Instansi</h5>
                                    <p class="text-2xl font-bold">{{ $totalKantor }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Total Admin -->
                <a href="{{ route('admins.index') }}" class="block">
                    <div class="bg-white text-black p-1 rounded-lg shadow-lg">
                        <div class="card-body">
                            <div class="flex items-center gap-6">
                                <!-- Icon dan Informasi Total Admin -->
                                <svg width="98" height="101" viewBox="0 0 98 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="1.5" y="1" width="95" height="99" rx="14" fill="#0DA538" />
                                    <rect x="1.5" y="1" width="95" height="99" rx="14" stroke="#0DA538" stroke-width="2" />
                                    <g clip-path="url(#clip0_4030_9197)">
                                        <path d="M65.6663 25.5H30.2497V31.75H26.083V35.9167H30.2497V40.0833H26.083V44.25H30.2497V48.4167H26.083V52.5833H30.2497V56.75H26.083V60.9167H30.2497V65.0833H26.083V69.25H30.2497V75.5H65.6663C67.3239 75.5 68.9137 74.8415 70.0858 73.6694C71.2579 72.4973 71.9163 70.9076 71.9163 69.25V31.75C71.9163 30.0924 71.2579 28.5027 70.0858 27.3306C68.9137 26.1585 67.3239 25.5 65.6663 25.5V25.5ZM51.083 33.8333C52.5252 33.8333 53.9349 34.261 55.134 35.0622C56.3331 35.8634 57.2677 37.0022 57.8196 38.3346C58.3715 39.667 58.5159 41.1331 58.2346 42.5475C57.9532 43.962 57.2588 45.2612 56.239 46.281C55.2192 47.3007 53.92 47.9952 52.5055 48.2766C51.0911 48.5579 49.625 48.4135 48.2926 47.8616C46.9602 47.3097 45.8214 46.3751 45.0202 45.176C44.219 43.9769 43.7913 42.5672 43.7913 41.125C43.7913 39.1911 44.5596 37.3365 45.927 35.969C47.2945 34.6016 49.1491 33.8333 51.083 33.8333ZM63.583 63H59.4163V58.8333C59.4163 58.2808 59.1968 57.7509 58.8061 57.3602C58.4154 56.9695 57.8855 56.75 57.333 56.75H44.833C44.2805 56.75 43.7506 56.9695 43.3599 57.3602C42.9692 57.7509 42.7497 58.2808 42.7497 58.8333V63H38.583V58.8333C38.583 57.1757 39.2415 55.586 40.4136 54.4139C41.5857 53.2418 43.1754 52.5833 44.833 52.5833H57.333C58.9906 52.5833 60.5803 53.2418 61.7524 54.4139C62.9245 55.586 63.583 57.1757 63.583 58.8333V63ZM47.958 41.125C47.958 40.5069 48.1413 39.9027 48.4847 39.3888C48.828 38.8749 49.3161 38.4744 49.8871 38.2379C50.4581 38.0013 51.0865 37.9395 51.6927 38.06C52.2989 38.1806 52.8557 38.4782 53.2927 38.9153C53.7298 39.3523 54.0274 39.9091 54.148 40.5153C54.2685 41.1215 54.2067 41.7499 53.9701 42.3209C53.7336 42.8919 53.3331 43.38 52.8192 43.7233C52.3053 44.0667 51.7011 44.25 51.083 44.25C50.2542 44.25 49.4593 43.9208 48.8733 43.3347C48.2872 42.7487 47.958 41.9538 47.958 41.125Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_4030_9197">
                                            <rect width="50" height="50" fill="white" transform="translate(24 25.5)" />
                                        </clipPath>
                                    </defs>
                                </svg>

                                <div>
                                    <h5 class="text-lg font-semibold">Total Admin</h5>
                                    <p class="text-2xl font-bold">{{ $totalAdmin }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Grafik Kondisi Barang -->
            <!-- <div class="grid grid-cols-1 mb-6">
                <div class="bg-white text-black p-4 rounded-lg shadow-lg">
                    <div class="card-body">
                        <h5 class="text-lg font-semibold mb-6">Grafik Kondisi Barang Berdasarkan Tahun</h5>
                        <canvas id="conditionChart" style="width: 100%; height: 50vh;"></canvas>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<!-- JavaScript untuk Sidebar Collapse -->
<script>
    document.getElementById('sidebarCollapse').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        var icons = document.querySelectorAll('.sidebar-icon');
        var texts = document.querySelectorAll('.sidebar-text');
        var header = document.querySelector('.sidebar-header');

        sidebar.classList.toggle('w-16');
        sidebar.classList.toggle('w-64');

        texts.forEach(function(text) {
            text.classList.toggle('hidden');
        });

        if (sidebar.classList.contains('w-16')) {
            header.classList.add('hidden');
        } else {
            header.classList.remove('hidden');
        }
    });

    // Data untuk Grafik Chart.js
    const ctx = document.getElementById('conditionChart').getContext('2d');
    const conditionChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {
                !!json_encode($tahunPembelian) !!
            },
            datasets: [{
                label: 'Baik',
                data: {
                    !!json_encode($jumlahBaik) !!
                },
                backgroundColor: '#4CAF50'
            }, {
                label: 'Kurang Baik',
                data: {
                    !!json_encode($jumlahKurangBaik) !!
                },
                backgroundColor: '#FFC107'
            }, {
                label: 'Rusak',
                data: {
                    !!json_encode($jumlahRusak) !!
                },
                backgroundColor: '#F44336'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection