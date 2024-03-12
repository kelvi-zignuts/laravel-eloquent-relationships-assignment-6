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
        $books = Book::with('genres')->get();
        return view('admin.books.index',compact('books'));
    }
    //create books
    public function create()
    {
        $genres = Genre::all();
        return view('admin.books.create',compact('genres'));
    }
    //store in database
//     public function store(Request $request)
//     {
//         $request->validate([
//             'title' => 'required|string|max:255',
//             'author' => 'required|string|max:255',
//             'genres' => 'required|array', // Ensure genres is an array
//         ]);
//         $book = new Book();
//         $book->title = $request->input('title');
//         $book->author = $request->input('author');
//         $book->save();
//         // dd($request->all(),$request->genres);
//         //         // $bookData = $request->only('title', 'author');
//         // $book = Book::create($request->only([
//         //     'Title'     => $request->title ?? "rakhee",
//         //     'Author'     => $request->author,
//         // ]));


//         //only method using unset
//         // $bookData = $request->only(['title', 'author']);
//         // $bookData['Title'] = $bookData['title']; // Map 'title' to 'Title'
//         // $bookData['Author'] = $bookData['author']; // Map 'author' to 'Author'
//         // unset($bookData['title'],$bookData['author']); // Unset 'title' as it's not needed anymore

//         // $book = Book::create($bookData);
// // dd($book);

//         $book->genres()->attach($request->genres);

//         return redirect()->route('admin.books.index')->with('success', 'book added successfully.');
//     }
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'genres' => 'required|array',
    ]);

    $bookData = $request->only(['title', 'author']);
    
    $book = Book::create($bookData);
    $book->genres()->attach($request->input('genres'));

    return redirect()->route('admin.books.index')->with('success', 'Book added successfully.');
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

    $bookData = $request->only(['title', 'author']);

    $book->update($bookData);

    $book->genres()->sync($request->input('genres'));

    return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
}
//     public function update(Request $request, $id)
// {
//     $book = Book::findOrFail($id);

//     // $request->validate([
//     //     'title' => 'required|string|max:255',
//     //     'author' => 'required|string|max:255',
//     //     'genres' => 'required|array', // Ensure genres is an array
//     // ]);

//     $bookData = $request->only(['title', 'author']);
//     $bookData['title'] = $bookData['title']; // Map 'title' to 'Title'
//     unset($bookData['title']); // Unset 'title' as it's not needed anymore

//     $book->update($bookData);

//     // Sync genres for the book
//     $book->genres()->sync($request->input('genres'));

//     return redirect()->route('admin.books.index')->with('success', 'book update successfully.');;
// }

    // Delete the specified book from storage
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'book deleted successfully.');;
    }
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.show', compact('book'));
    }
}
