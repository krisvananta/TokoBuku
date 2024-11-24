<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Buku;
use Illuminate\Http\Request;

class BookApiController extends Controller
{
    // Get all books
    public function index()
    {
        $books = Buku::latest()->paginate(5);

        return new BookResource(true, 'List Data Buku', $books);
    }

    // Post (buat buku baru)
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|integer',
        ]);

        $book = Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
        ]);

        return new BookResource(true, 'Buku berhasil ditambahkan', $book);
    }

    // Get one book
    public function show($id)
    {
        $book = Buku::findOrFail($id); // Find book by ID or fail
        return new BookResource(true, 'Detail Buku', $book);
    }

    // Put/Patch (update)
    public function update(Request $request, $id)
    {
        $book = Buku::findOrFail($id);
        $book->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
        ]);

        return new BookResource(true, 'Buku berhasil diperbarui', $book);
    }

    // Delete a book
    public function destroy($id)
    {
        $book = Buku::findOrFail($id);
        $book->delete();

        return new BookResource(true, 'Buku berhasil dihapus', null);
    }
}
