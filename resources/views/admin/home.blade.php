@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
  <h1 class="font-arial mb-6 font-extrabold" style="font-size: 35px; line-height: 52px; text-align: left; color:#2284DF">
    DASHBOARD
  </h1>
    <!-- Bagian Kiri: Card Total Satuan Kerja, Barang, Pegawai -->
    <div class="space-y-4">
      <!-- Total Satuan Kerja -->
      <a href="{{ route('unit_satuan_kerjas.index') }}">
      <div class="bg-white text-black p-1 rounded-lg shadow-lg">
        <div class="card-body">
          <div class="flex items-center gap-6">
            <svg width="97" height="97" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="1" y="1" width="95" height="95" rx="9" fill="#2284DF" />
              <rect x="1" y="1" width="95" height="95" rx="9" stroke="white" stroke-width="2" />
              <g clip-path="url(#clip0_4028_4076)">
                <path d="M73.5 44.3334V39.9771C73.5002 38.8543 73.1979 37.7521 72.6249 36.7865C72.0519 35.8209 71.2294 35.0274 70.2437 34.4896L51.4937 24.2625C50.5759 23.7601 49.5464 23.4968 48.5 23.4968C47.4536 23.4968 46.4241 23.7601 45.5062 24.2625L26.7562 34.4896C25.7706 35.0274 24.9481 35.8209 24.3751 36.7865C23.8021 37.7521 23.4998 38.8543 23.5 39.9771V44.3334H29.75V63.0834H25.5833V69.3334H23.5V73.5H73.5V69.3334H71.4167V63.0834H67.25V44.3334H73.5ZM52.6667 44.3334V63.0834H44.3333V44.3334H52.6667ZM33.9167 44.3334H40.1667V63.0834H33.9167V44.3334ZM63.0833 63.0834H56.8333V44.3334H63.0833V63.0834Z" fill="white" />
              </g>
              <defs>
                <clipPath id="clip0_4028_4076">
                  <rect width="50" height="50" fill="white" transform="translate(23.5 23.5)" />
                </clipPath>
              </defs>
            </svg>
            <div>
              <h5 class="text-center font-bold">Total Satuan Kerja</h5>
              <p class="text-center text-3xl">{{ $totalSatuanKerja }}</p>
            </div>
          </div>
        </div>
      </div>
      </a>

      <!-- Total Barang -->
      <a href="{{ route('laporan.barang') }}">
      <div class="bg-white text-black p-1 rounded-lg shadow-lg">
        <div class="card-body">
          <div class="flex items-center gap-6">
            <svg width="97" height="97" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="1" y="1" width="95" height="95" rx="9" fill="#F2C219" />
              <rect x="1" y="1" width="95" height="95" rx="9" stroke="#F2C219" stroke-width="2" />
              <g clip-path="url(#clip0_4028_4092)">
                <path d="M63.0837 23.5H33.917C32.2594 23.5 30.6697 24.1585 29.4976 25.3306C28.3255 26.5027 27.667 28.0924 27.667 29.75V46.4167H69.3337V29.75C69.3337 28.0924 68.6752 26.5027 67.5031 25.3306C66.331 24.1585 64.7413 23.5 63.0837 23.5V23.5ZM52.667 38.0833H44.3337V33.9167H52.667V38.0833Z" fill="white" />
                <path d="M27.667 50.5833V73.4999H69.3337V50.5833H27.667ZM52.667 63.0832H44.3337V58.9166H52.667V63.0832Z" fill="white" />
              </g>
              <defs>
                <clipPath id="clip0_4028_4092">
                  <rect width="50" height="50" fill="white" transform="translate(23.5 23.5)" />
                </clipPath>
              </defs>
            </svg>
            <div>
              <h5 class="text-center font-bold">Total Barang</h5>
              <p class="text-center text-3xl">{{ $totalBarang }}</p>
            </div>
          </div>
        </div>
        </a>
      </div>

      <!-- Total Pegawai -->
      <a href="{{ route('data_pegawais.index') }}">
      <div class="bg-white text-black p-1 rounded-lg shadow-lg">
        <div class="card-body">
          <div class="flex items-center gap-6">
            <svg width="97" height="97" viewBox="0 0 97 97" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="1" y="1" width="95" height="95" rx="14" fill="#0DA538" />
              <rect x="1" y="1" width="95" height="95" rx="14" stroke="#0DA538" stroke-width="2" />
              <g clip-path="url(#clip0_4028_4084)">
                <path d="M65.1663 23.5H29.7497V29.75H25.583V33.9167H29.7497V38.0833H25.583V42.25H29.7497V46.4167H25.583V50.5833H29.7497V54.75H25.583V58.9167H29.7497V63.0833H25.583V67.25H29.7497V73.5H65.1663C66.8239 73.5 68.4137 72.8415 69.5858 71.6694C70.7579 70.4973 71.4163 68.9076 71.4163 67.25V29.75C71.4163 28.0924 70.7579 26.5027 69.5858 25.3306C68.4137 24.1585 66.8239 23.5 65.1663 23.5V23.5ZM50.583 31.8333C52.0252 31.8333 53.4349 32.261 54.634 33.0622C55.8331 33.8634 56.7677 35.0022 57.3196 36.3346C57.8715 37.667 58.0159 39.1331 57.7346 40.5475C57.4532 41.962 56.7588 43.2612 55.739 44.281C54.7192 45.3007 53.42 45.9952 52.0055 46.2766C50.5911 46.5579 49.125 46.4135 47.7926 45.8616C46.4602 45.3097 45.3214 44.3751 44.5202 43.176C43.719 41.9769 43.2913 40.5672 43.2913 39.125C43.2913 37.1911 44.0596 35.3365 45.427 33.969C46.7945 32.6016 48.6491 31.8333 50.583 31.8333ZM63.083 61H58.9163V56.8333C58.9163 56.2808 58.6968 55.7509 58.3061 55.3602C57.9154 54.9695 57.3855 54.75 56.833 54.75H44.333C43.7805 54.75 43.2506 54.9695 42.8599 55.3602C42.4692 55.7509 42.2497 56.2808 42.2497 56.8333V61H38.083V56.8333C38.083 55.1757 38.7415 53.586 39.9136 52.4139C41.0857 51.2418 42.6754 50.5833 44.333 50.5833H56.833C58.4906 50.5833 60.0803 51.2418 61.2524 52.4139C62.4245 53.586 63.083 55.1757 63.083 56.8333V61ZM47.458 39.125C47.458 38.5069 47.6413 37.9027 47.9847 37.3888C48.328 36.8749 48.8161 36.4744 49.3871 36.2379C49.9581 36.0013 50.5865 35.9395 51.1927 36.06C51.7989 36.1806 52.3557 36.4782 52.7927 36.9153C53.2298 37.3523 53.5274 37.9091 53.648 38.5153C53.7685 39.1215 53.7067 39.7499 53.4701 40.3209C53.2336 40.8919 52.8331 41.38 52.3192 41.7233C51.8053 42.0667 51.2011 42.25 50.583 42.25C49.7542 42.25 48.9593 41.9208 48.3733 41.3347C47.7872 40.7487 47.458 39.9538 47.458 39.125Z" fill="white" />
              </g>
              <defs>
                <clipPath id="clip0_4028_4084">
                  <rect width="50" height="50" fill="white" transform="translate(23.5 23.5)" />
                </clipPath>
              </defs>
            </svg>
            <div>
              <h5 class="text-center font-bold">Total Pegawai</h5>
              <p class="text-center text-3xl">{{ $totalPegawai }}</p>
            </div>
          </div>
        </div>
        </a>
      </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Grafik Barang Berdasarkan Keadaan
  const conditionCtx = document.getElementById('hart').getContext('2d');
  new Chart(conditionCtx, {
    type: 'bar',
    data: {
      labels: ['Baik', 'Kurang Baik', 'Rusak'],
      datasets: [{
        label: 'Jumlah Barang',
        data: [{
          {
            $barangBaik
          }
        }, {
          {
            $barangKurangBaik
          }
        }, {
          {
            $barangRusak
          }
        }],
        backgroundColor: ['#4CAF50', '#FFEB3B', '#F44336'],
        borderColor: ['#4CAF50', '#FFEB3B', '#F44336'],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false
        },
        datalabels: {
          anchor: 'end',
          align: 'top',
          font: {
            weight: 'bold',
            size: 10
          },
          color: 'black',
          formatter: function(value) {
            return Math.round(value); // Tidak menggunakan desimal
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            precision: 0 // Menghilangkan angka desimal pada sumbu y
          }
        }
      }
    }
  });
</script>
@endsection