<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IssuedBooksDetail;
use App\Models\LibraryCard;
use App\Models\Book;

class IssuedBooksDetailController extends Controller
{
    public function index()
    {
        $issuedBooks = IssuedBooksDetail::with(['libraryCard.user', 'books'])->get();
        return view('admin.issued_books.index', compact('issuedBooks'));
    }

    public function create()
    {
        $libraryCards = LibraryCard::with('user')->get();
        $books = Book::all();
        return view('admin.issued_books.create', compact('libraryCards', 'books'));
    }

    public function store(Request $request)
    {

        $issuedBook = IssuedBooksDetail::create([
            'card_id' => $request->input('card_id'),
            'issued_date' => $request->input('issued_date'),
            'fixed_return_date' => $request->input('fixed_return_date'),
            'is_returned' => $request->input('is_returned'), 
            'return_date_at' => $request->input('return_date_at'),
        ]);

        
        $selectedBooks = $request->input('books', []);
    
        foreach ($selectedBooks as $bookId) {
            $book = Book::find($bookId);
            
            if ($book) {
                $book->update(['issued' => 'yes']);
                $issuedBook->books()->attach($bookId);
            }
        }
        return redirect()->route('admin.issued_books.index')->with('success', 'Issued book added successfully.');
    }

    public function edit(IssuedBooksDetail $issuedBook)
    {
        $libraryCards = LibraryCard::with('user')->get();
        $books = Book::all();
        return view('admin.issued_books.edit', compact('issuedBook', 'libraryCards', 'books'));
    }

    public function update(Request $request, IssuedBooksDetail $issuedBook)
    {


        $issuedBook->update([
            'card_id' => $request->input('card_id'),
            'issued_date' => $request->input('issued_date'),
            'fixed_return_date' => $request->input('fixed_return_date'),
            'is_returned' => $request->input('is_returned'), 
            'return_date_at' => $request->input('return_date_at'),
        ]);

        $selectedBooks = $request->input('books', []);
    
    // Detach all currently associated books
    $issuedBook->books()->detach();

    foreach ($selectedBooks as $bookId) {
        $book = Book::find($bookId);
        
        if ($book) {
            $book->update(['is_issued' => true]);
            $issuedBook->books()->attach($bookId);
        }
    }

        return redirect()->route('admin.issued_books.index')->with('success', 'Issued book updated successfully.');
    }

    public function destroy(IssuedBooksDetail $issuedBook)
    {
        $issuedBook->delete();
        return redirect()->route('admin.issued_books.index')->with('success', 'Issued book deleted successfully.');
    }
    public function show(IssuedBooksDetail $issuedBook)
    {
        return view('admin.issued_books.show', compact('issuedBook'));
    }
}
