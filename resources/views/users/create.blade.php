<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

    <h1 class="text-xl font-bold mb-4">➕ Tambah User</h1>

    <form action="{{ route('users.store') }}" method="POST" class="bg-white p-6 rounded shadow w-96">
        @csrf

        <input type="text" name="name" placeholder="Nama"
               class="w-full border p-2 mb-2 rounded">

        <input type="email" name="email" placeholder="Email"
               class="w-full border p-2 mb-2 rounded">

        <input type="password" name="password" placeholder="Password"
               class="w-full border p-2 mb-2 rounded">

        <select name="role" class="w-full border p-2 mb-4 rounded">
            <option value="petugas">Petugas</option>
            <option value="peminjam">Peminjam</option>
        </select>

        <button class="bg-blue-500 text-white px-4 py-2 rounded w-full">
            Simpan
        </button>
    </form>

</body>
</html>