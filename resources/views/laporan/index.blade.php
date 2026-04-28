@extends('layouts.app')

@section('content')

<!-- HEADER + BACK BUTTON -->
<div class="flex items-center justify-between mb-4">

    <a href="{{ url('/dashboard') }}"
       class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
        ← Kembali
    </a>

    <h1 class="text-2xl font-bold">📊 Laporan Peminjaman</h1>

    <div></div>
</div>

<!-- FILTER -->
<form method="GET" class="mb-4 flex gap-2">

    <input type="date" name="from" class="border p-2 rounded">

    <input type="date" name="to" class="border p-2 rounded">

    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Filter
    </button>

</form>

<!-- TABLE -->
<div class="bg-white shadow rounded overflow-hidden">

    <table class="w-full text-sm">

        <thead class="bg-gray-200">
            <tr>
                <th class="p-2">No</th>
                <th>User</th>
                <th>Buku</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            @forelse($data as $d)
            <tr class="text-center border-t hover:bg-gray-50">

                <td class="p-2">{{ $loop->iteration }}</td>
                <td>{{ $d->user->name ?? '-' }}</td>
                <td>{{ $d->book->judul ?? '-' }}</td>
                <td>{{ $d->tanggal_pinjam }}</td>
                <td>{{ $d->status }}</td>

            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-gray-500 text-center">
                    Tidak ada data laporan
                </td>
            </tr>
            @endforelse

        </tbody>

    </table>

</div>

@endsection