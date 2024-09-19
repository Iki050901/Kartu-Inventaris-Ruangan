<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Dashboard</title>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Judul Besar Dashboard -->
            <a href="{{ route('dashboard') }}" class="text-2xl font-bold" style="color:#2284DF;">DASHBOARD</a>

            <!-- Dropdown Menu (Icon Kepala) -->
            <div class="relative">
                <button id="dropdownButton" class="flex items-center bg-gray-200 px-4 py-2 rounded hover:bg-gray-300 focus:outline-none focus:bg-gray-300">
                    <!-- Logo Kepala (User Icon) -->
                    <img src="{{ asset('img/user.png') }}" alt="User Icon" class="h-6 w-6 text-gray-600">
                </button>

                <!-- Dropdown Content -->
                <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center w-full p-3 text-black">
                            <svg class="w-6 h-6 sidebar-icon" viewBox="0 0 24 24" fill="none">
                                <path d="M1.66667 17.5V2.5C1.66667 2.27899 1.75446 2.06702 1.91074 1.91074C2.06702 1.75446 2.27899 1.66667 2.5 1.66667H6.66667V0H2.5C1.83696 0 1.20107 0.263392 0.732233 0.732233C0.263392 1.20107 0 1.83696 0 2.5L0 17.5C0 18.163 0.263392 18.7989 0.732233 19.2678C1.20107 19.7366 1.83696 20 2.5 20H6.66667V18.3333H2.5C2.27899 18.3333 2.06702 18.2455 1.91074 18.0893C1.75446 17.933 1.66667 17.721 1.66667 17.5Z" fill="black" />
                                <path d="M19.2695 8.23182L15.4478 4.41016L14.2695 5.58849L17.8228 9.14182L4.16699 9.16599V10.8327L17.8695 10.8085L14.2678 14.4102L15.4462 15.5885L19.2678 11.7668C19.7367 11.2982 20.0003 10.6626 20.0006 9.99967C20.0009 9.33676 19.7379 8.70086 19.2695 8.23182Z" fill="black" />
                            </svg>
                            <span class="ml-3 sidebar-text">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content Area -->
    <div class="container mx-auto mt-8">
        @yield('content')
    </div>

    <script>
        // Toggle Dropdown Menu
        document.getElementById('dropdownButton').addEventListener('click', function() {
            var dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown if clicked outside
        document.addEventListener('click', function(event) {
            var dropdownButton = document.getElementById('dropdownButton');
            var dropdownMenu = document.getElementById('dropdownMenu');

            if (!dropdownButton.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>