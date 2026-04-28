<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 text-white flex justify-between items-center">
        <h1 class="font-bold text-lg">📚 Perpustakaan Digital</h1>

        <div class="flex items-center gap-4">
            <span class="text-sm">
                {{ auth()->user()->name ?? 'User' }} 
                ({{ auth()->user()->role ?? 'user' }})
            </span>

            <!-- Logout (WAJIB POST) -->
            <form action="/logout" method="POST">
                @csrf
                <button class="bg-red-500 px-3 py-1 rounded hover:bg-red-600">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- Content -->
    <div class="p-6">
        @yield('content')
    </div>

</body>
</html>