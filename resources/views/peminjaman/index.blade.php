@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">📥 Peminjaman Buku</h1>

@if(session('success'))
<div class="bg-green-200 p-2 mb-3 rounded">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-200 p-2 mb-3 rounded">
    {{ session('error') }}
</div>
@endif

<!-- FORM PINJAM -->
<form action="/peminjaman/store" method="POST"
      class="bg-white p-4 rounded shadow mb-4">

    @csrf

    <!-- USER OTOMATIS LOGIN -->
    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

    <!-- PILIH BUKU -->
    <select name="book_id" class="border p-2 w-full mb-2 rounded">
        <option value="">-- Pilih Buku --</option>
        @foreach($books as $b)
            <option value="{{ $b->id }}">
                {{ $b->judul }} (stok: {{ $b->stok }})
            </option>
        @endforeach
    </select>

    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Pinjam
    </button>

</form>

<!-- TABLE -->
<table class="w-full bg-white shadow rounded">

    <tr class="bg-gray-200">
        <th class="p-2">No</th>
        <th>Nama</th>
        <th>Buku</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @forelse($data as $d)
    <tr class="text-center border-t">

        <td class="p-2">{{ $loop->iteration }}</td>

        <td>{{ $d->user->name ?? '-' }}</td>
        <td>{{ $d->book->judul ?? '-' }}</td>
        <td>{{ $d->tanggal_pinjam ?? '-' }}</td>

        <td>
            <span class="{{ $d->status == 'dipinjam' ? 'text-red-500' : 'text-green-500' }}">
                {{ $d->status }}
            </span>
        </td>

        <td class="space-x-2">

            <!-- KEMBALI -->
            @if($d->status == 'dipinjam')
            <form action="/peminjaman/kembali/{{ $d->id }}" method="POST" class="inline">
                @csrf
                <button class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">
                    Kembali
                </button>
            </form>
            @endif

            <!-- HAPUS -->
            <form action="/peminjaman/delete/{{ $d->id }}" method="POST" class="inline">
                @csrf
                @method('DELETE')

                <button onclick="return confirm('Yakin hapus?')"
                        class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                    Hapus
                </button>
            </form>

        </td>

    </tr>

    @empty
    <tr>
        <td colspan="6" class="text-center p-4 text-gray-500">
            Belum ada data peminjaman
        </td>
    </tr>
    @endforelse

</table>

@endsection