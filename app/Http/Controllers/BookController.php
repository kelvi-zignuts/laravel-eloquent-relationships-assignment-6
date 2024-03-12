<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;

class BookController extends Controller
{
    //show all books in index page
    public function index()
    {
        // $books = Book::with('genres')->get();
        $books = Book::all();
        $booksCount = Book::count();
        return view('admin.books.index',['books'=>$books,'booksCount'=>$booksCount]);

    }

    //create books
    public function create()
    {
        $genres = Genre::all();
        return view('admin.books.create',compact('genres'));
    }

    //store in database
    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genres' => 'required|array',
        ]);

        $bookData = $request->only(['title', 'author']);
        
        // create with created_by
        $book = Book::create($bookData+ ['created_by' => $user->id]);

        // attach genres to a book.
        $book->genres()->attach($request->input('genres'));

        return redirect()->route('admin.books.index')->with('success', 'Book added successfully.');
    }

    //edit books
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $genres = Genre::all();
        return view('admin.books.edit',compact('book','genres'));
    }

    // update books
    public function update(Request $request, $id)
    {
        $user = auth()->user();

        $book = Book::findOrFail($id);

        $bookData = $request->only(['title', 'author']);

        //update with updated_by
        $book->update($bookData+ ['updated_by' => $user->id]);

        // synchronize the genres associated with a book 
        // updating the genres that are linked to a particular book.
        $book->genres()->sync($request->input('genres'));

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
    }

    // Delete books 
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'book deleted successfully.');;
    }

    //view books with all details
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.show', compact('book'));
    }
}
