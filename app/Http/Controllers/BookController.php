<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // ====================
    // LIST
    // ====================
    public function index()
    {
        $this->authorizeRole();

        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // ====================
    // STORE
    // ====================
    public function store(Request $request)
    {
        $this->authorizeRole();

        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'stok' => 'required|integer'
        ]);

        Book::create($request->only([
            'judul','penulis','penerbit','tahun','stok'
        ]));

        return redirect()->back()->with('success', 'Buku ditambahkan');
    }

    // ====================
    // EDIT
    // ====================
    public function edit($id)
    {
        $this->authorizeRole();

        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    // ====================
    // UPDATE
    // ====================
    public function update(Request $request, $id)
    {
        $this->authorizeRole();

        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'stok' => 'required|integer'
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->only([
            'judul','penulis','penerbit','tahun','stok'
        ]));

        return redirect('/books')->with('success', 'Buku diupdate');
    }

    // ====================
    // DELETE (FIXED)
    // ====================
    public function destroy($id)
    {
        $this->authorizeRole();

        Book::destroy($id);

        return redirect()->back()->with('success', 'Buku dihapus');
    }

    // ====================
    // ROLE CHECK (biar gak ulang-ulang)
    // ====================
    private function authorizeRole()
    {
        $user = auth()->user();

        if (!$user || !in_array($user->role, ['admin', 'petugas'])) {
            abort(403);
        }
    }
}