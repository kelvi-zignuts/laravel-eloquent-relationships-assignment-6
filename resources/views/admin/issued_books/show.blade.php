<x-app-layout>
    <div class="container bg-white p-6 mt-16 w-50 rounded">
        <div class="mt-3" style="color:blue;">
            <a href="{{route('admin.issued_books.index')}}"><i class="fas fa-arrow-circle-left"
                    style="margin-left:70px; font-size:30px;"></i></a>
        </div>
        <div class="container mt-4 d-flex justify-content-center align-content-center w-100">

            <div class="card card shadow text-center w-75 mb-6 rounded">
                <div class="card-header text-center">
                    <h1 class="card-title">Issued Books Details</h1>
                </div>
                <div class="card-body">
                    <h5><strong>Library Card:</strong> {{ $issuedBook->libraryCard->name }} -
                        {{ $issuedBook->libraryCard->user->name }}</h5>
                    <p><strong>Issued Date:</strong> {{ $issuedBook->issued_date }}</p>
                    <p><strong>Fixed Return Date:</strong> {{ $issuedBook->fixed_return_date }}</p>
                    <p><strong>Issued Books: </strong>
                        @foreach ($issuedBook->books as $book)
                        {{ $book->title }}
                        @if (!$loop->last)
                        ,
                        @endif
                        @endforeach
                    </p>
                    <!-- <a href="{{ route('admin.issued_books.index') }}" class="btn btn-primary mt-3">Back to Issued Books</a> -->
                </div>
            </div>
        </div>

    </div>

</x-app-layout>