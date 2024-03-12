<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IssuedBooksDetail;
use App\Models\LibraryCard;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IssuedBooksDetailController extends Controller
{
    //show all data 
    public function index()
    {
        $books = Book::with('issuedBooksDetails')->get();
        $issuedBooks = IssuedBooksDetail::with(['libraryCard.user', 'books'])->get();

        return view('admin.issued_books.index', compact('books', 'issuedBooks'));
    }

    //create 
    public function create()
    {
        $libraryCards = LibraryCard::with('user')->get();
        $books = Book::all();
        return view('admin.issued_books.create', compact('libraryCards', 'books'));
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'card_id' => 'required',
            'issued_date' => 'required|date',
            'fixed_return_date' => 'required|date',
            'is_returned' => 'required|boolean',
            'return_date_at' => $request->is_returned == 1 ? 'required|date' : '', // Validate if is_returned is true
        ]);

        
        $cardId = $request->input('card_id');
        $bookId = $request->input('books')[0]; // Assuming only one book is selected
        
        // Check if the book is already issued using issued_book table 
        $isBookAlreadyIssued = DB::table('issued_books')
        ->join('issued_books_details', 'issued_books.issued_books_detail_id', '=', 'issued_books_details.id')
        ->where('issued_books.book_id', $bookId)
        ->where('issued_books_details.is_returned', 0)
        ->get();
        
        // Filter the issued books for the current user
        // the user has already issued the book.
        $userIssuedBooks = $isBookAlreadyIssued->filter(function ($issuedBook) use ($cardId) {
            return $issuedBook->card_id == $cardId;
        });

        // already issued book by another user and same book issued by you
        if ($isBookAlreadyIssued->isNotEmpty()) {
            if ($userIssuedBooks->isNotEmpty()) {
                return redirect()->route('admin.issued_books.create')
                ->with('error', 'You have already issued this book.');
            } else {
                return redirect()->route('admin.issued_books.create')
                ->with('error', 'This book is already issued by another user.');
            }
        }
        
        // only() method with created_by
        $issuedBook = IssuedBooksDetail::create($request->only([
            'card_id',
            'issued_date',
            'fixed_return_date',
            'is_returned',
            'return_date_at',
        ])+ ['created_by' => auth()->id()]);

        // Attach the book to the issued details through the pivot table
        $issuedBook->books()->attach($bookId);

        return redirect()->route('admin.issued_books.index')->with('success', 'Issued book added successfully.');
    }

    //edit
    public function edit(IssuedBooksDetail $issuedBook)
    {
        $libraryCards = LibraryCard::with('user')->get();
        $books = Book::all();
        return view('admin.issued_books.edit', compact('issuedBook', 'libraryCards', 'books'));
    }

    //update
    public function update(Request $request, IssuedBooksDetail $issuedBook)
    {
        //with updated_by
        $issuedBook->update($request->only([
            'card_id',
            'issued_date',
            'fixed_return_date',
            'is_returned',
            'return_date_at',
        ]) + ['updated_by' => Auth::id()]);

        $selectedBooks = $request->input('books', []);

        //if already used book then in edit time not select issued book by another user
        $isBookAlreadyIssued = DB::table('issued_books')
        ->join('issued_books_details', 'issued_books.issued_books_detail_id', '=', 'issued_books_details.id')
        ->where('issued_books.book_id', $selectedBooks)
        ->where('issued_books_details.is_returned', 0)
        ->get();

    
        if ($isBookAlreadyIssued->isNotEmpty()) {
            return redirect()->route('admin.issued_books.edit', $issuedBook->id)
                ->with('error', 'selected books are already issued to another user.');
        }

        if ($request->input('is_returned') == 1) {
            // it only if the book is returned
            $issuedBook->books()->detach();
        } else {
            // If 'is_returned' is not 'Yes', proceed with attaching selected books
            $selectedBooks = $request->input('books', []);
    
            // it before assigning new books regardless of the return status
            $issuedBook->books()->detach();
    
            foreach ($selectedBooks as $bookId) {
                $book = Book::find($bookId);
    
                if ($book) {
                    $issuedBook->books()->attach($bookId);
                }
            }
        }
        return redirect()->route('admin.issued_books.index')->with('success', 'Issued book updated successfully.');
    }
    
    //delete
    public function destroy(IssuedBooksDetail $issuedBook)
    {
        $issuedBook->delete();
        return redirect()->route('admin.issued_books.index')->with('success', 'Issued book deleted successfully.');
    }
    
    //view all details
    public function show(IssuedBooksDetail $issuedBook)
    {
        return view('admin.issued_books.show', compact('issuedBook'));
    }
}
