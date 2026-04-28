<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center mb-6">Login Perpustakaan</h2>

        {{-- Error message --}}
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    required
                    class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="block mb-1 font-medium">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    required
                    class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- Button --}}
            <button 
                type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
                Login
            </button>
        </form>
    </div>

</body>
</html>