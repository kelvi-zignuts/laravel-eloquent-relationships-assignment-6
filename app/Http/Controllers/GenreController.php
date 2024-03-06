<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genres.index', compact('genres'));
    }

    // Show form to create a new genre
    public function create()
    {
        return view('admin.genres.create');
    }

    // Store a newly created genre in storage
    public function store(Request $request)
    {
        Genre::create([
            'genre_Name' => $request->input('name'),
            'Description' => $request->input('description'),
            // Add more fields as needed
        ]);

        return redirect()->route('admin.genres.index')->with('success', 'Genre created successfully!');
    }

    // Show form to edit a genre
    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('admin.genres.edit', compact('genre'));
    }

    // Update the specified genre in storage
    public function update(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->update([
            'genre_Name' => $request->input('name'),
            'Description' => $request->input('description'),
        ]);

        return redirect()->route('admin.genres.index')->with('success', 'Genre updated successfully!');
    }

    // Delete the specified genre from storage
    public function destroy($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('admin.genres.index')->with('success', 'Genre deleted successfully!');
    }
    public function show($id)
    {
        $genre = Genre::findOrFail($id);
        return view('admin.genres.show', compact('genre'));
    }
}
