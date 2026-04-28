<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // ====================
    // LIST BOOK (ADMIN + PETUGAS)
    // ====================
    public function index()
    {
        $user = auth()->user();

        if (!$user || !in_array($user->role, ['admin', 'petugas'])) {
            abort(403);
        }

        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // ====================
    // STORE
    // ====================
    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user || !in_array($user->role, ['admin', 'petugas'])) {
            abort(403);
        }

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

        return redirect()->back();
    }

    // ====================
    // EDIT
    // ====================
    public function edit($id)
    {
        $user = auth()->user();

        if (!$user || !in_array($user->role, ['admin', 'petugas'])) {
            abort(403);
        }

        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    // ====================
    // UPDATE
    // ====================
    public function update(Request $request, $id)
    {
        $user = auth()->user();

        if (!$user || !in_array($user->role, ['admin', 'petugas'])) {
            abort(403);
        }

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

        return redirect('/books');
    }

    // ====================
    // DELETE
    // ====================
    public function delete($id)
    {
        $user = auth()->user();

        if (!$user || !in_array($user->role, ['admin', 'petugas'])) {
            abort(403);
        }

        Book::destroy($id);

        return redirect()->back();
    }
}