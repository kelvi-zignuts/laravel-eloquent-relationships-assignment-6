<x-app-layout>
    <div class="mt-3" style="color:blue;">
        <a href="{{route('admin.issued_books.index')}}"><i class="fas fa-arrow-circle-left"
                style="margin-left:70px; font-size:20px;"></i></a>
    </div>
    <div class="container mt-4 d-flex justify-content-center align-items-center">

        <div class="card" style="width: 50%; ">
            <div class="card-body">
                <h5 class="card-title">Library Card: {{ $issuedBook->libraryCard->name }} -
                    {{ $issuedBook->libraryCard->user->name }}</h5>
                <p class="card-text">Issued Date: {{ $issuedBook->issued_date }}</p>
                <p class="card-text">Fixed Return Date: {{ $issuedBook->fixed_return_date }}</p>
                <!-- <a href="{{ route('admin.issued_books.index') }}" class="btn btn-primary mt-3">Back to Issued Books</a> -->
            </div>
        </div>
    </div>
</x-app-layout>