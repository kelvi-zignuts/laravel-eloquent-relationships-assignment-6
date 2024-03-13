<x-app-layout>
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card shadow" style="width: 50%; border-radius: 10px;">
            <div class="card-header text-center">
                <h1 class="card-title">Add Issued Books</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.issued_books.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="card_id">Library Card:</label>
                        <select name="card_id" id="card_id" class="form-control" required>
                            @foreach($libraryCards as $libraryCard)
                            <option value="{{ $libraryCard->id }}">{{ $libraryCard->card_id }} -
                                {{ $libraryCard->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="book">Select Book:</label>
                        <select name="books[]" id="book" class="form-control" required>
                            @foreach ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="issued_date">Issued Date</label>
                        <input type="date" class="form-control" id="issued_date" name="issued_date"
                            value="{{ now()->toDateString() }}" required>
                    </div>
                    <div class="form-group">
                        <label for="expiry_date">Expiry Date</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                            value="{{ now()->addWeek()->toDateString() }}" required>
                    </div>
                    <div class="form-group">
                        <label for="is_returned">Is Returned:</label>
                        <select name="is_returned" id="is_returned" class="form-control" required>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <button class="btn btn-primary mt-3">Add Issued Book</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>