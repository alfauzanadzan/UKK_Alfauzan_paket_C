@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">📊 Laporan Peminjaman</h1>

<!-- FILTER -->
<form method="GET" class="mb-4 flex gap-2">
    <input type="date" name="from" class="border p-2">
    <input type="date" name="to" class="border p-2">
    <button class="bg-blue-500 text-white px-4">Filter</button>
</form>

<table class="w-full bg-white shadow">
<tr class="bg-gray-200">
    <th>No</th>
    <th>User</th>
    <th>Buku</th>
    <th>Tanggal</th>
    <th>Status</th>
</tr>

@foreach($data as $d)
<tr class="text-center border-t">
    <td>{{ $loop->iteration }}</td>
    <td>{{ $d->user->name ?? '-' }}</td>
    <td>{{ $d->book->judul ?? '-' }}</td>
    <td>{{ $d->tanggal_pinjam }}</td>
    <td>{{ $d->status }}</td>
</tr>
@endforeach

</table>

@endsection