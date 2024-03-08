<!-- resources/views/issued_books/create.blade.php -->
<x-app-layout>
    <div class="container">
        <h2>Create Issued Book</h2>
        <form action="{{ route('admin.issued_books.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="card_id">Library Card:</label>
                <select name="card_id" id="card_id" class="form-control">
                    @foreach($libraryCards as $libraryCard)
                        <option value="{{ $libraryCard->id }}">{{ $libraryCard->name }} - {{ $libraryCard->user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="book">Select Book:</label>
                <select name="books[]" id="book" class="form-control">
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->Title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="issued_date">Issued Date:</label>
                <input type="date" name="issued_date" id="issued_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="fixed_return_date">Fixed Return Date:</label>
                <input type="date" name="fixed_return_date" id="fixed_return_date" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="is_returned">Is Returned:</label>
                <select name="is_returned" id="is_returned" class="form-control">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
            <div class="form-group" id="return_date_group">
                <label for="return_date_at">Return Date At:</label>
                <input type="date" name="return_date_at" id="return_date_at" class="form-control">
            </div>

            <button class="btn btn-primary mt-3">Add Issued Book</button>
        </form>
    </div>
</x-app-layout>

