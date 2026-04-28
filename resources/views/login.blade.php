<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 flex items-center justify-center px-4">

    <div class="w-full max-w-md">

        <!-- Card -->
        <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

            <!-- Header -->
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Perpustakaan Digital</h1>
                <p class="text-sm text-gray-500 mt-1">Masuk ke akun kamu</p>
            </div>

            <!-- Error -->
            @if(session('error'))
                <div class="mb-4 bg-red-50 border border-red-200 text-red-600 px-3 py-2 rounded-lg text-sm">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login.process') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <label class="text-sm font-medium text-gray-700">Email</label>
                    <input 
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        placeholder="you@example.com"
                        class="mt-1 w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none transition">
                </div>

                <!-- Password -->
                <div>
                    <label class="text-sm font-medium text-gray-700">Password</label>
                    <input 
                        type="password"
                        name="password"
                        required
                        placeholder="••••••••"
                        class="mt-1 w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none transition">
                </div>

                <!-- Button -->
                <button 
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                    Masuk
                </button>
            </form>

        </div>

        <!-- Footer -->
        <p class="text-center text-xs text-gray-500 mt-4">
            © {{ date('Y') }} Perpustakaan Digital
        </p>

    </div>

</body>
</html>