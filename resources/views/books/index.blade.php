@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">📚 Data Buku</h1>

@if(session('success'))
<div class="bg-green-200 p-2 mb-3 rounded">
    {{ session('success') }}
</div>
@endif

<!-- FORM TAMBAH -->
<form action="{{ route('books.store') }}" method="POST"
      class="bg-white p-4 rounded shadow mb-4">
    @csrf

    <input type="text" name="judul" placeholder="Judul"
           class="border p-2 w-full mb-2 rounded">

    <input type="text" name="penulis" placeholder="Penulis"
           class="border p-2 w-full mb-2 rounded">

    <input type="text" name="penerbit" placeholder="Penerbit"
           class="border p-2 w-full mb-2 rounded">

    <input type="number" name="tahun" placeholder="Tahun"
           class="border p-2 w-full mb-2 rounded">

    <input type="number" name="stok" placeholder="Stok"
           class="border p-2 w-full mb-2 rounded">

    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        + Tambah Buku
    </button>
</form>

<!-- TABLE -->
<table class="w-full bg-white shadow rounded overflow-hidden">

    <tr class="bg-gray-200 text-left">
        <th class="p-2">No</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    @forelse($books as $b)
    <tr class="border-t">

        <td class="p-2">{{ $loop->iteration }}</td>
        <td>{{ $b->judul }}</td>
        <td>{{ $b->penulis }}</td>
        <td>{{ $b->stok }}</td>

        <td class="space-x-2">

            <!-- EDIT -->
            <a href="{{ route('books.edit', $b->id) }}"
               class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">
                Edit
            </a>

            <!-- DELETE -->
            <form action="{{ route('books.delete', $b->id) }}"
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
        <td colspan="5" class="text-center p-4 text-gray-500">
            Belum ada data buku
        </td>
    </tr>
    @endforelse

</table>

@endsection