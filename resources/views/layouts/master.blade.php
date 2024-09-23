<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>

<body>

    <!-- navbar -->
    <nav class="bg-black p-4">
        <div class="container mx-auto flex items-center">
            <!-- Logo dan Nama Web -->
            <a href="#" class="flex items-center">
                <img src="{{ asset('img/Kabupaten Garut.svg') }}" alt="Logo Kabupaten Garut" class="w-10 h-10">
                <span class="text-white text-sm font-medium ml-3 max-w-xs">
                    DINAS KOMUNIKASI DAN INFORMATIKA <br> KABUPATEN GARUT
                </span>
            </a>
        </div>
    </nav>
    <div class="flex">

        <!-- Sidebar -->
        <div id="sidebar" class="min-h-screen w-64 transition-all duration-300" style="background-color:#1A69B2">
            <div class="flex items-center justify-between p-4">
                <div class="flex items-center sidebar-header">
                    <img src="{{ asset('img/ic_person_48px.svg') }}" alt="Super Admin" class="w-8 h-8 text-white">
                    <h4 class="text-white font-semibold ml-3">Super Admin</h4>
                </div>
                <button class="text-white" id="sidebarCollapse">&#9776;</button>
            </div>
            <ul class="mt-3 space-y-2">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center p-3 text-white hover:bg-blue-400 hover:text-blue-700 transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-400 text-blue-700' : '' }}">
                        <svg class="w-6 h-6 sidebar-icon" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3l8 6v12h-6v-6h-4v6h-6v-12l8-6z" />
                        </svg>
                        <span class="ml-3 sidebar-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('units.index') }}" class="flex items-center p-3 text-white hover:bg-blue-400 hover:text-blue-700 transition-all duration-200 {{ request()->routeIs('units.index') || request()->routeIs('units.create') || request()->routeIs('units.edit') || request()->routeIs('units.show') ? 'bg-blue-400 text-blue-700' : '' }}">
                        <svg class="w-6 h-6 mr-3 sidebar-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M11 0H3C2.20435 0 1.44129 0.31607 0.87868 0.87868C0.31607 1.44129 0 2.20435 0 3L0 24H14V3C14 2.20435 13.6839 1.44129 13.1213 0.87868C12.5587 0.31607 11.7956 0 11 0V0ZM6 19H3V17H6V19ZM6 15H3V13H6V15ZM6 11H3V9H6V11ZM6 7H3V5H6V7ZM11 19H8V17H11V19ZM11 15H8V13H11V15ZM11 11H8V9H11V11ZM11 7H8V5H11V7ZM21 5H16V24H24V8C24 7.20435 23.6839 6.44129 23.1213 5.87868C22.5587 5.31607 21.7956 5 21 5ZM21 19H19V17H21V19ZM21 15H19V13H21V15ZM21 11H19V9H21V11Z" />
                        </svg>
                        <span class="ml-3 sidebar-text">Instansi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('laporan.super') }}" class="flex items-center p-3 text-white hover:bg-blue-400 hover:text-blue-700 transition-all duration-200 {{ request()->routeIs('laporan.super') ? 'bg-blue-400 text-blue-700' : '' }}">
                        <svg class="w-6 h-6 sidebar-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M14 7V0H6C5.20435 0 4.44129 0.31607 3.87868 0.87868C3.31607 1.44129 3 2.20435 3 3V24H21V7H14ZM7 10H17V12H7V10ZM7 14H17V16H7V14ZM13.135 21C12.4116 20.9994 11.7105 20.7501 11.149 20.294C10.835 20.071 10.725 20 10.487 20C9.82687 20.0227 9.1953 20.2749 8.701 20.713L7.293 19.293C8.15899 18.4785 9.29828 18.0173 10.487 18C11.1518 18.0079 11.7941 18.2421 12.308 18.664C12.5321 18.8752 12.8271 18.995 13.135 19C13.86 19 14.823 17.945 15.176 17.434L16.826 18.564C16.655 18.813 15.106 21 13.135 21ZM16 0.219C16.5959 0.408346 17.1391 0.734745 17.586 1.172L19.828 3.414C20.2676 3.85979 20.5956 4.40325 20.785 5H16V0.219Z" />
                        </svg>
                        <span class="ml-3 sidebar-text">Laporan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admins.index') }}" class="flex items-center p-3 text-white hover:bg-blue-400 hover:text-blue-700 transition-all duration-200 {{ request()->routeIs('admins.index') || request()->routeIs('admins.create') || request()->routeIs('admins.edit') || request()->routeIs('admins.show') ? 'bg-blue-400 text-blue-700' : '' }}">
                        <svg class="w-6 h-6 sidebar-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19.9998 0H2.99983V3H0.999832V5H2.99983V7H0.999832V9H2.99983V11H0.999832V13H2.99983V15H0.999832V17H2.99983V19H0.999832V21H2.99983V24H19.9998C20.7955 24 21.5585 23.6839 22.1212 23.1213C22.6838 22.5587 22.9998 21.7956 22.9998 21V3C22.9998 2.20435 22.6838 1.44129 22.1212 0.878679C21.5585 0.31607 20.7955 0 19.9998 0V0ZM12.9998 4C13.6921 4 14.3688 4.20527 14.9443 4.58985C15.5199 4.97444 15.9685 5.52106 16.2334 6.16061C16.4983 6.80015 16.5676 7.50388 16.4326 8.18281C16.2975 8.86175 15.9642 9.48539 15.4747 9.97487C14.9852 10.4644 14.3616 10.7977 13.6826 10.9327C13.0037 11.0678 12.3 10.9985 11.6604 10.7336C11.0209 10.4687 10.4743 10.0201 10.0897 9.44449C9.7051 8.86892 9.49983 8.19223 9.49983 7.5C9.49983 6.57174 9.86858 5.6815 10.525 5.02513C11.1813 4.36875 12.0716 4 12.9998 4ZM18.9998 18H16.9998V16C16.9998 15.7348 16.8945 15.4804 16.7069 15.2929C16.5194 15.1054 16.265 15 15.9998 15H9.99983C9.73462 15 9.48026 15.1054 9.29273 15.2929C9.10519 15.4804 8.99983 15.7348 8.99983 16V18H6.99983V16C6.99983 15.2043 7.3159 14.4413 7.87851 13.8787C8.44112 13.3161 9.20418 13 9.99983 13H15.9998C16.7955 13 17.5585 13.3161 18.1212 13.8787C18.6838 14.4413 18.9998 15.2043 18.9998 16V18ZM11.4998 7.5C11.4998 7.20333 11.5878 6.91332 11.7526 6.66664C11.9174 6.41997 12.1517 6.22771 12.4258 6.11418C12.6999 6.00065 13.0015 5.97094 13.2925 6.02882C13.5834 6.0867 13.8507 6.22956 14.0605 6.43934C14.2703 6.64912 14.4131 6.91639 14.471 7.20736C14.5289 7.49833 14.4992 7.79993 14.3857 8.07402C14.2721 8.34811 14.0799 8.58238 13.8332 8.7472C13.5865 8.91202 13.2965 9 12.9998 9C12.602 9 12.2205 8.84196 11.9392 8.56066C11.6579 8.27935 11.4998 7.89782 11.4998 7.5Z" />
                        </svg>
                        <span class="ml-3 sidebar-text">Data Admin</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('super_admin.index') }}" class="flex items-center p-3 text-white hover:bg-blue-400 hover:text-blue-700 transition-all duration-200 {{ request()->routeIs('super_admin.index') || request()->routeIs('super_admin.edit') ? 'bg-blue-400 text-blue-700' : '' }}">
                        <svg class="w-6 h-6 sidebar-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.9999 12C20.9997 11.4483 20.9495 10.8977 20.8499 10.355L23.8929 8.6L20.8929 3.4L17.8489 5.159C17.0085 4.43993 16.0427 3.88194 14.9999 3.513V0H8.99995V3.513C7.9572 3.88194 6.9914 4.43993 6.15095 5.159L3.10695 3.4L0.106949 8.6L3.14995 10.355C2.95006 11.4426 2.95006 12.5574 3.14995 13.645L0.106949 15.4L3.10695 20.6L6.15095 18.842C6.99148 19.5607 7.95728 20.1184 8.99995 20.487V24H14.9999V20.487C16.0427 20.1181 17.0085 19.5601 17.8489 18.841L20.8929 20.6L23.8929 15.4L20.8499 13.645C20.9495 13.1023 20.9997 12.5517 20.9999 12ZM14.9999 12C14.9999 12.5933 14.824 13.1734 14.4944 13.6667C14.1647 14.1601 13.6962 14.5446 13.148 14.7716C12.5998 14.9987 11.9966 15.0581 11.4147 14.9424C10.8327 14.8266 10.2982 14.5409 9.87863 14.1213C9.45907 13.7018 9.17335 13.1672 9.05759 12.5853C8.94184 12.0033 9.00125 11.4001 9.22831 10.8519C9.45537 10.3038 9.83989 9.83524 10.3332 9.50559C10.8266 9.17595 11.4066 9 11.9999 9C12.7956 9 13.5587 9.31607 14.1213 9.87868C14.6839 10.4413 14.9999 11.2044 14.9999 12Z" />
                        </svg>
                        <span class="ml-3 sidebar-text">Pengaturan Profil</span>
                    </a>
                </li>
                <li>
                    <!-- <hr class="border-t border-blue-400 mx-3"> -->
                    <div class="pl-3">
                        <svg width="211" height="2" viewBox="0 0 211 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 1H211" stroke="white" stroke-width="2" />
                        </svg>
                    </div>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center w-full p-3 text-white hover:bg-blue-400 hover:text-blue-700 transition-all duration-200">
                            <svg class="w-6 h-6 sidebar-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M1.66667 17.5V2.5C1.66667 2.27899 1.75446 2.06702 1.91074 1.91074C2.06702 1.75446 2.27899 1.66667 2.5 1.66667H6.66667V0H2.5C1.83696 0 1.20107 0.263392 0.732233 0.732233C0.263392 1.20107 0 1.83696 0 2.5L0 17.5C0 18.163 0.263392 18.7989 0.732233 19.2678C1.20107 19.7366 1.83696 20 2.5 20H6.66667V18.3333H2.5C2.27899 18.3333 2.06702 18.2455 1.91074 18.0893C1.75446 17.933 1.66667 17.721 1.66667 17.5Z" />
                                <path d="M19.2695 8.23182L15.4478 4.41016L14.2695 5.58849L17.8228 9.14182L4.16699 9.16599V10.8327L17.8695 10.8085L14.2678 14.4102L15.4462 15.5885L19.2678 11.7668C19.7367 11.2982 20.0003 10.6626 20.0006 9.99967C20.0009 9.33676 19.7379 8.70086 19.2695 8.23182Z" />
                            </svg>
                            <span class="ml-3 sidebar-text">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main content -->
        <div class="flex-grow p-4 bg-gray-200">
            @yield('content')
        </div>
    </div>

    <script>
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        });
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>