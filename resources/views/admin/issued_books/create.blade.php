<!-- resources/views/issued_books/create.blade.php -->
<x-app-layout>
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 50%;">
            <div class="card-body">
                <h2 class="card-title">Create Issued Book</h2>
                
                @if(session('error'))
                    <div class="alert alert-danger" id="errorAlert">{{ session('error') }}</div>
                @endif

                <form action="{{ route('admin.issued_books.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="card_id">Library Card:</label>
                        <select name="card_id" id="card_id" class="form-control" required>
                            @foreach($libraryCards as $libraryCard)
                                <option value="{{ $libraryCard->id }}">{{ $libraryCard->name }} - {{ $libraryCard->user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="book">Select Book:</label>
                        <select name="books[]" id="book" class="form-control" required>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->Title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="issued_date">Issued Date:</label>
                        <input type="date" name="issued_date" id="issued_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fixed_return_date">Fixed Return Date:</label>
                        <input type="date" name="fixed_return_date" id="fixed_return_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="is_returned">Is Returned:</label>
                        <select name="is_returned" id="is_returned" class="form-control" required>
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
        </div>
    </div>
</x-app-layout>
