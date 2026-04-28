<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

    <h1 class="text-xl font-bold mb-4">✏️ Edit User</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST"
          class="bg-white p-6 rounded shadow w-96">

        @csrf
        @method('PUT')

        <input type="text" name="name"
               value="{{ $user->name }}"
               class="w-full border p-2 mb-2 rounded">

        <input type="email" name="email"
               value="{{ $user->email }}"
               class="w-full border p-2 mb-2 rounded">

        <select name="role" class="w-full border p-2 mb-4 rounded">

            <option value="petugas" {{ $user->role == 'petugas' ? 'selected' : '' }}>Petugas</option>
            <option value="peminjam" {{ $user->role == 'peminjam' ? 'selected' : '' }}>Peminjam</option>

        </select>

        <button class="bg-yellow-500 text-white px-4 py-2 rounded w-full hover:bg-yellow-600">
            Update
        </button>

    </form>

</body>
</html>