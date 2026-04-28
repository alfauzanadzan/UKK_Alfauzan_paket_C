<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-4">

        <a href="{{ url('/dashboard') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
            ← Kembali
        </a>

        <h1 class="text-xl font-bold">👤 Kelola User</h1>

        <a href="{{ route('users.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Tambah User
        </a>

    </div>

    <!-- TABLE -->
    <div class="bg-white shadow rounded-lg p-4">

        <table class="w-full text-sm">

            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2">Nama</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Role</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($users as $user)
                <tr class="border-t hover:bg-gray-50">

                    <td class="p-2">{{ $user->name }}</td>
                    <td class="p-2">{{ $user->email }}</td>
                    <td class="p-2">{{ $user->role }}</td>

                    <td class="p-2 space-x-2">

                        <!-- EDIT -->
                        <a href="{{ route('users.edit', $user->id) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                            Edit
                        </a>

                        <!-- DELETE -->
                        <form action="{{ route('users.destroy', $user->id) }}"
                              method="POST"
                              class="inline">

                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Yakin hapus user ini?')"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center p-4 text-gray-500">
                        Belum ada data user
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</body>
</html>