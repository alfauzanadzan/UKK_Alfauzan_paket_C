<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Peminjam</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-blue-600 text-white px-6 py-4 flex justify-between items-center shadow">

        <h1 class="text-xl font-bold">
            📚 Perpustakaan
        </h1>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="bg-red-500 px-4 py-2 rounded hover:bg-red-600 transition">
                Logout
            </button>
        </form>

    </nav>

    <!-- CONTENT -->
    <div class="p-6 flex justify-center">

        <!-- CARD -->
        <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition w-full max-w-md text-center">

            <h2 class="text-xl font-semibold mb-2">
                📖 Selamat Datang
            </h2>

            <p class="text-gray-500 mb-6">
                Silakan pinjam buku yang tersedia
            </p>

            <a href="{{ url('/peminjaman') }}"
               class="bg-blue-500 text-white px-6 py-3 rounded hover:bg-blue-600 inline-block">
                Lihat & Pinjam Buku
            </a>

        </div>

    </div>

</body>
</html>