<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use App\Models\LibraryCard;
use App\Models\IssuedBooksDetail;

class BookController extends Controller
{
    //show all books in index page
    public function index()
    {
        // $books = Book::with('genres')->get();
        $books = Book::all();
        return view('admin.books.index', ['books' => $books]);

    }
    
    public function dashboard()
    {
        $booksCount = Book::count();
        $cardsCount = LibraryCard::count();
        $genresCount = Genre::count();
        $issuedBooksCount = IssuedBooksDetail::count();
        return view('dashboard', compact('booksCount','cardsCount','genresCount','issuedBooksCount'));
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
        $book = Book::find($id);
        if (!$book) {
            return redirect()->route('admin.books.index')->with('error', 'Book not found with the provided ID.');
        }
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
        $book = Book::find($id);
        if (!$book) {
            return redirect()->route('admin.books.index')->with('error', 'Book not found with the provided ID.');
        }
        return view('admin.books.show', compact('book'));
    }
}
