<?php

// app/Http/Controllers/CardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LibraryCard;
use App\Models\IssuedBooksDetail;
use App\Models\Preference;
use Auth;

class CardController extends Controller
{
    public function index()
    {
        $cards = LibraryCard::with('issuedBooksDetails')->get();
        return view('admin.cards.index', compact('cards'));
    }

    public function create()
    {
        return view('admin.cards.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'issued_date' => 'required|date',
        'expiry_date' => 'required|date|after:issued_date',
    ]);

    $user = auth()->user();

    $request_data = $request->only(['name', 'issued_date','expiry_date']);
    $libraryCard = LibraryCard::create($request_data + [
        'card_id' => $this->generateCardId(),
        'user_id' => $user->id,
        'created_by' => $user->id,
    ]);

    return redirect()->route('admin.cards.index')->with('success', 'Library card created successfully!');
}

    public function show($id)
    {
        $card = LibraryCard::with('issuedBooksDetails')->findOrFail($id);
        return view('admin.cards.show', compact('card'));
    }

    public function edit($id)
    {
        $card = LibraryCard::findOrFail($id);
        return view('admin.cards.edit', compact('card'));
    }

    public function update(Request $request, $id)
    {
        $card = LibraryCard::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'issued_date' => 'required|date',
            'expiry_date' => 'required|date|after:issued_date',
        ]);

        $user = auth()->user();
        // $card->update([
        //     'name' => $request->input('name'),
        //     'issued_date' => $request->input('issued_date'),
        //     'expiry_date' => $request->input('expiry_date'),
        //     'updated_by' => $user->id,
        // ]);

        $request_data = $request->only(['name', 'issued_date','expiry_date']);
        $card ->update($request_data + [
        'updated_by' => $user->id,
    ]);
        return redirect()->route('admin.cards.index')->with('success', 'Library card updated successfully!');
    }

    public function destroy($id)
    {
        $card = LibraryCard::findOrFail($id);
        $card->delete();

        return redirect()->route('admin.cards.index')->with('success', 'Library card deleted successfully!');
    }

    public function generateCardId()
    {
        // Retrieve the next card ID
        $nextCardId = Preference::where('key', 'next_card_id')->first();

        // If next_card_id doesn't exist, create it
        if (!$nextCardId) {
            $nextCardId = Preference::create([
                'key' => 'next_card_id',
                'value' => 1,
            ]);
        } else {
            // Increment the value of next_card_id and save it
            $nextCardId->increment('value');
        }

        return 'CARD' . str_pad($nextCardId->value, 5, '0', STR_PAD_LEFT);
    }
}
