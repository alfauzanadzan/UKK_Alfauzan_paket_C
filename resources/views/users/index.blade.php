<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">👤 Kelola User</h1>

        <a href="{{ route('users.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">
            + Tambah User
        </a>
    </div>

    <div class="bg-white shadow rounded-lg p-4">

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2">Nama</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Role</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr class="border-t">
                    <td class="p-2">{{ $user->name }}</td>
                    <td class="p-2">{{ $user->email }}</td>
                    <td class="p-2">{{ $user->role }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>