<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- NAVBAR -->
    <nav class="bg-blue-600 text-white px-6 py-4 flex justify-between items-center shadow">
        <div>
            <h1 class="text-xl font-bold">Dashboard Admin</h1>
            <p class="text-sm text-blue-100">
                Selamat datang, {{ auth()->user()->name }}
            </p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="bg-red-500 px-4 py-2 rounded hover:bg-red-600 transition">
                Logout
            </button>
        </form>
    </nav>

    <!-- CONTENT -->
    <div class="p-6">

        <h2 class="text-lg font-semibold mb-4">Menu Utama</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- CARD BOOKS -->
            <a href="{{ url('/books') }}"
               class="bg-white p-6 rounded-xl shadow hover:shadow-lg hover:-translate-y-1 transition">
                <h2 class="text-lg font-semibold">📚 Kelola Buku</h2>
                <p class="text-gray-500 mt-2">Tambah, edit, dan hapus data buku</p>
            </a>

            <!-- CARD LAPORAN -->
            <a href="{{ url('/laporan') }}"
               class="bg-white p-6 rounded-xl shadow hover:shadow-lg hover:-translate-y-1 transition">
                <h2 class="text-lg font-semibold">📊 Laporan</h2>
                <p class="text-gray-500 mt-2">Lihat laporan peminjaman</p>
            </a>

            <!-- CARD USER (BARU) -->
            <a href="{{ url('/users') }}"
               class="bg-white p-6 rounded-xl shadow hover:shadow-lg hover:-translate-y-1 transition">
                <h2 class="text-lg font-semibold">👤 Kelola User</h2>
                <p class="text-gray-500 mt-2">Tambah admin, petugas, peminjam</p>
            </a>

        </div>

    </div>

</body>
</html>