<x-app-layout>
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card shadow" style="width: 50%; margin-top: 20px;  border-radius: 10px;">
            <div class="card-header text-center">
                <h1 class="card-title">Edit Issued Books</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.issued_books.update', $issuedBook->id) }}" method="post"
                    onsubmit="return validateForm()">
                    @csrf
                    <div class="form-group">
                        <label for="card_id">Library Card:</label>
                        <select name="card_id" id="card_id" class="form-control">
                            @foreach($libraryCards as $libraryCard)
                            <option value="{{ $libraryCard->id }}"
                                {{ $libraryCard->id == $issuedBook->card_id ? 'selected' : '' }}>
                                {{ $libraryCard->card_id }} -
                                {{ $libraryCard->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="book_id">Select Book:</label>
                        <select name="books[]" id="book_id" class="form-control">
                            @foreach ($books as $book)
                            <option value="{{ $book->id }}"
                                {{ $issuedBook->books->contains('id', $book->id) ? 'selected' : '' }}>
                                {{ $book->title }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="issued_date">Issued Date:</label>
                        <input type="date" name="issued_date" id="issued_date" class="form-control"
                            value="{{ $issuedBook->issued_date }}">
                    </div>

                    <div class="form-group">
                        <label for="fixed_return_date">Fixed Return Date:</label>
                        <input type="date" name="fixed_return_date" id="fixed_return_date" class="form-control"
                            value="{{ $issuedBook->fixed_return_date }}">
                    </div>

                    <div class="form-group">
                        <label for="is_returned">Is Returned:</label>
                        <select name="is_returned" id="is_returned" class="form-control"
                            onchange="toggleReturnDateField()">
                            <option value="0" {{ $issuedBook->is_returned == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ $issuedBook->is_returned == 1 ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>

                    <div class="form-group" id="return_date_group">
                        <label for="return_date_at">Return Date At:</label>
                        <input type="date" name="return_date_at" id="return_date_at" class="form-control"
                            value="{{ $issuedBook->return_date_at }}"
                            {{ $issuedBook->is_returned == 0 ? 'disabled' : '' }}>
                    </div>
                    <button class="btn btn-primary mt-3">Update Issued Book</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>