<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Book;

class PeminjamanController extends Controller
{
    public function index()
    {
        $data = Peminjaman::with('user','book')->get();
        $users = User::all();
        $books = Book::all();

        return view('peminjaman.index', compact('data','users','books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required'
        ]);

        $book = Book::findOrFail($request->book_id);

        // ❗ CEK STOK
        if ($book->stok <= 0) {
            return back()->with('error', 'Stok buku habis!');
        }

        // ✅ SIMPAN + STATUS
        Peminjaman::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'tanggal_pinjam' => now(),
            'status' => 'dipinjam' // 🔥 WAJIB
        ]);

        // KURANGI STOK
        $book->decrement('stok');

        return back()->with('success','Buku berhasil dipinjam');
    }

    public function kembali($id)
    {
        $data = Peminjaman::findOrFail($id);

        if ($data->status == 'kembali') {
            return back()->with('error','Sudah dikembalikan');
        }

        $data->update([
            'status' => 'kembali',
            'tanggal_kembali' => now()
        ]);

        // TAMBAH STOK
        $data->book->increment('stok');

        return back()->with('success','Buku dikembalikan');
    }

    public function delete($id)
    {
        $data = Peminjaman::findOrFail($id);

        // 🔥 BALIKIN STOK KALAU MASIH DIPINJAM
        if ($data->status == 'dipinjam') {
            $data->book->increment('stok');
        }

        $data->delete();

        return back()->with('success','Data dihapus');
    }
}