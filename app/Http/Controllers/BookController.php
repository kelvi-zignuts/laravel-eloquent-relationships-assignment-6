<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('genres')->get();
        return view('admin.books.index',compact('books'));
    }
    public function create()
    {
        $genres = Genre::all();
        return view('admin.books.create',compact('genres'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genres' => 'required|array', // Ensure genres is an array
        ]);
        $book = new Book();
        $book->Title = $request->input('title');
        $book->Author = $request->input('author');
        $book->save();

        $book->genres()->attach($request->input('genres'));

        return redirect()->route('admin.books.index');
    }
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $genres = Genre::all();
        return view('admin.books.edit',compact('book','genres'));
    }
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->Title = $request->input('title');
        $book->Author = $request->input('author');
        // Add more fields as needed
        $book->save();

        // Sync genres for the book
        $book->genres()->sync($request->input('genres'));

        return redirect()->route('admin.books.index');
    }

    // Delete the specified book from storage
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.books.index');
    }
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.show', compact('book'));
    }
}
