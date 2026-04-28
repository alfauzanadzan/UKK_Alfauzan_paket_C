@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">✏️ Edit Buku</h1>

<form action="{{ route('books.update', $book->id) }}" method="POST"
      class="bg-white p-4 rounded shadow">

    @csrf
    @method('PUT')

    <input type="text" name="judul"
           value="{{ $book->judul }}"
           class="border p-2 w-full mb-2 rounded"
           placeholder="Judul">

    <input type="text" name="penulis"
           value="{{ $book->penulis }}"
           class="border p-2 w-full mb-2 rounded"
           placeholder="Penulis">

    <input type="text" name="penerbit"
           value="{{ $book->penerbit }}"
           class="border p-2 w-full mb-2 rounded"
           placeholder="Penerbit">

    <input type="number" name="tahun"
           value="{{ $book->tahun }}"
           class="border p-2 w-full mb-2 rounded"
           placeholder="Tahun">

    <input type="number" name="stok"
           value="{{ $book->stok }}"
           class="border p-2 w-full mb-2 rounded"
           placeholder="Stok">

    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Update Buku
    </button>

    <a href="{{ route('books.index') }}"
       class="ml-2 text-gray-600">
        Cancel
    </a>

</form>

@endsection