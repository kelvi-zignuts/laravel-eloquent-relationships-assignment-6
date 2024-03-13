<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LibraryCard;
use App\Models\IssuedBooksDetail;
use App\Models\Preference;
use Auth;
use Carbon\Carbon;

class CardController extends Controller
{
    //show all library cards
    public function index()
    {
        $cards = LibraryCard::with('issuedBooksDetails')->get();
        return view('admin.cards.index', compact('cards'));
    }

    //create 
    public function create()
    {
        return view('admin.cards.create');
    }

    //store in database
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        // 'expiry_date' => 'required|date|after:issued_date',
    ]);

    $user = auth()->user();

    // Use Carbon to get the current date and time
    $currentDate = Carbon::now();

    $issuedDate = now()->toDateString();

    $expiryDate = now()->addYear()->toDateString();

    $request_data = $request->only(['name']);

    $libraryCard = LibraryCard::create($request_data + [
        'card_id' => $this->generateCardId(),
        'user_id' => $user->id,
        'created_by' => $user->id,
        'issued_date' => $currentDate, // Set the issued_date to the current date
        'expiry_date' => $expiryDate,
    ]);

    return redirect()->route('admin.cards.index')->with('success', 'Library card created successfully!');
}
    //view all details
    public function show($id)
    {
        $card = LibraryCard::with('issuedBooksDetails')->find($id);
        if (!$card) {
            return redirect()->route('admin.cards.index')->with('error', 'card not found with the provided ID.');
        }
        return view('admin.cards.show', compact('card'));
    }

    //edit 
    public function edit($id)
    {
        $card = LibraryCard::find($id);
        if (!$card) {
            return redirect()->route('admin.cards.index')->with('error', 'card not found with the provided ID.');
        }
        return view('admin.cards.edit', compact('card'));
    }

    //update
    public function update(Request $request, $id)
    {
        $card = LibraryCard::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'issued_date' => 'required|date',
            'expiry_date' => 'required|date|after:issued_date',
        ]);

        $user = auth()->user();

        $request_data = $request->only(['name', 'issued_date','expiry_date']);

        $card ->update($request_data + [
        'updated_by' => $user->id,
    ]);
        return redirect()->route('admin.cards.index')->with('success', 'Library card updated successfully!');
    }

    //delete
    public function destroy($id)
    {
        $card = LibraryCard::findOrFail($id);
        $card->delete();

        return redirect()->route('admin.cards.index')->with('success', 'Library card deleted successfully!');
    }

    //genereate card_id with CARD00001....using preference table (key and value)
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

        //fixed length of 5 digits, padding with zeros on the left 
        return 'CARD' . str_pad($nextCardId->value, 5, '0', STR_PAD_LEFT);
    }
}
