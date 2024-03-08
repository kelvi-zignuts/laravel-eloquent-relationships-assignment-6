
<x-app-layout>
    <div class="container">
        <h2>Issued Book Details</h2>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Library Card: {{ $issuedBook->libraryCard->name }} - {{ $issuedBook->libraryCard->user->name }}</h5>
                <p class="card-text">Issued Date: {{ $issuedBook->issued_date }}</p>
                <p class="card-text">Fixed Return Date: {{ $issuedBook->fixed_return_date }}</p>
               
            </div>
        </div>

        <a href="{{ route('admin.issued_books.index') }}" class="btn btn-secondary mt-3">Back to Issued Books</a>
    </div>
</x-app-layout>
