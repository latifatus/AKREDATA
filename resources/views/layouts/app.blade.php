<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AKREDATA</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-950 text-white p-5">

        <h1 class="text-2xl font-bold mb-2">AKREDATA</h1>

        <p class="text-sm mb-8">
            Sistem Informasi Manajemen Publikasi dan Data Alumni
        </p>

        <nav class="space-y-3">

            <a href="/dashboard" class="block p-3 rounded hover:bg-blue-800">
                🏠 Dashboard
            </a>

            <a href="#" class="block p-3 rounded hover:bg-blue-800">
                👨‍🎓 Data Alumni
            </a>

            <a href="#" class="block p-3 rounded hover:bg-blue-800">
                👨‍🏫 Publikasi Dosen
            </a>


            <a href="#" class="block p-3 rounded hover:bg-blue-800">
                📁 Dokumen
            </a>

        </nav>

    </aside>


    <!-- Content -->
    <div class="flex-1">


        <!-- Navbar -->
        <header class="bg-white shadow p-5 flex justify-between items-center">

            <h2 class="font-bold text-xl">
                Dashboard
            </h2>


            <!-- Profile Dropdown -->
            <div class="relative">

                <button
                    onclick="document.getElementById('profileMenu').classList.toggle('hidden')"
                    class="flex items-center gap-2 font-semibold">

                    {{ Auth::user()->name }}
                    ⌄

                </button>


                <div id="profileMenu"
                    class="hidden absolute right-0 mt-3 w-48 bg-white rounded-lg shadow-lg border z-50">


                    <a href="#" class="block px-4 py-3 hover:bg-gray-100">
                        👤 Profil
                    </a>


                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button class="w-full text-left px-4 py-3 hover:bg-gray-100 text-red-600">
                            🚪 Logout
                        </button>

                    </form>

                </div>

            </div>

        </header>


        <!-- Content -->
        <main class="p-6">

            {{ $slot }}

        </main>


    </div>

</div>

</body>
</html>