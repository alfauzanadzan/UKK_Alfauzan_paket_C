@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">✏️ Edit Peminjaman</h1>

<form action="/peminjaman/update/{{ $data->id }}" method="POST" class="bg-white p-4 rounded shadow">
    @csrf

    <!-- USER -->
    <select name="user_id" class="border p-2 w-full mb-2 rounded">
        @foreach($users as $u)
            <option value="{{ $u->id }}"
                {{ $data->user_id == $u->id ? 'selected' : '' }}>
                {{ $u->name }}
            </option>
        @endforeach
    </select>

    <!-- BOOK -->
    <select name="book_id" class="border p-2 w-full mb-2 rounded">
        @foreach($books as $b)
            <option value="{{ $b->id }}"
                {{ $data->book_id == $b->id ? 'selected' : '' }}>
                {{ $b->judul }}
            </option>
        @endforeach
    </select>

    <button class="bg-blue-500 text-white px-4 py-2 rounded">
        Update
    </button>
</form>

@endsection