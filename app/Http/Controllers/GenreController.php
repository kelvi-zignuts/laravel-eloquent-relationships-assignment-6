<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;

class GenreController extends Controller
{
    //show all data
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genres.index', compact('genres'));
    }

    // create 
    public function create()
    {
        return view('admin.genres.create');
    }

    // Store
    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'genre_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            
        ]);
    
        $genreData = $request->only(['genre_name', 'description']);
    
        Genre::create($genreData + ['created_by' => $user->id]);
    
        return redirect()->route('admin.genres.index')->with('success', 'Genre created successfully!');
    }    
    // edit genre
    // public function edit($id)
    // {
    //     $genre = Genre::findOrFail($id);
    //     return view('admin.genres.edit', compact('genre'));
    // }

    public function edit($id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return redirect()->route('admin.genres.index')->with('error', 'Genre not found with the provided ID.');
        }

        return view('admin.genres.edit', compact('genre'));
    }

    // Updategenre 
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        $genre = Genre::find($id);
        $genreData = $request->only(['genre_name', 'description']);
        $genre->update($genreData + ['updated_by' => $user->id]);
    
        return redirect()->route('admin.genres.index')->with('success', 'Genre updated successfully!');
    }

    // Delete genre 
    public function destroy($id)
    {
        $genre = Genre::find($id);
        $genre->delete();

        return redirect()->route('admin.genres.index')->with('success', 'Genre deleted successfully!');
    }

    //view all details
    public function show($id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return redirect()->route('admin.genres.index')->with('error', 'Genre not found with the provided ID.');
        }
        return view('admin.genres.show', compact('genre'));
    }
}