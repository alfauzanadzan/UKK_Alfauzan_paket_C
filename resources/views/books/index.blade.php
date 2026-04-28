@extends('layouts.app')

@section('content')

<!-- HEADER + BACK BUTTON -->
<div class="flex items-center justify-between mb-4">

    <a href="{{ url('/dashboard') }}"
       class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
        ← Kembali
    </a>

    <h1 class="text-2xl font-bold">📚 Data Buku</h1>

    <div></div>
</div>

<!-- SUCCESS MESSAGE -->
@if(session('success'))
<div class="bg-green-100 text-green-700 p-2 mb-3 rounded">
    {{ session('success') }}
</div>
@endif

<!-- FORM TAMBAH -->
<form action="{{ route('books.store') }}" method="POST"
      class="bg-white p-4 rounded shadow mb-6">

    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

        <input type="text" name="judul" placeholder="Judul"
               class="border p-2 rounded w-full">

        <input type="text" name="penulis" placeholder="Penulis"
               class="border p-2 rounded w-full">

        <input type="text" name="penerbit" placeholder="Penerbit"
               class="border p-2 rounded w-full">

        <input type="number" name="tahun" placeholder="Tahun"
               class="border p-2 rounded w-full">

        <input type="number" name="stok" placeholder="Stok"
               class="border p-2 rounded w-full">

    </div>

    <button class="mt-3 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Tambah Buku
    </button>

</form>

<!-- TABLE -->
<div class="bg-white shadow rounded overflow-hidden">

    <table class="w-full text-sm">

        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="p-2">No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($books as $b)
            <tr class="border-t hover:bg-gray-50">

                <td class="p-2">{{ $loop->iteration }}</td>
                <td>{{ $b->judul }}</td>
                <td>{{ $b->penulis }}</td>
                <td>{{ $b->penerbit }}</td>
                <td>{{ $b->tahun }}</td>
                <td>{{ $b->stok }}</td>

                <td class="space-x-2">

                    <!-- EDIT -->
                    <a href="{{ route('books.edit', $b->id) }}"
                       class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">
                        Edit
                    </a>

                    <!-- DELETE -->
                    <form action="{{ route('books.destroy', $b->id) }}"
                          method="POST"
                          class="inline">

                        @csrf
                        @method('DELETE')

                        <button onclick="return confirm('Yakin hapus buku ini?')"
                                class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                            Hapus
                        </button>

                    </form>

                </td>

            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center p-4 text-gray-500">
                    Belum ada data buku
                </td>
            </tr>
            @endforelse

        </tbody>

    </table>

</div>

@endsection