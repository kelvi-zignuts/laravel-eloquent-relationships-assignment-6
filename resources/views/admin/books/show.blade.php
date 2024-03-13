<x-app-layout>
    <!-- <div class="mt-3" style="color:blue;">
        <a href="{{route('admin.books.index')}}"><i class="fas fa-arrow-circle-left"
                style="margin-left:70px; font-size:20px;"></i></a>
    </div> -->
    <div class="container bg-white p-6 mt-16 w-50 rounded">
        <div class="mt-3" style="color:blue;">
            <a href="{{route('admin.books.index')}}"><i class="fas fa-arrow-circle-left"
                    style="margin-left:20px; font-size:30px;"></i></a>
        </div>
        <div class="container mt-4 d-flex justify-content-center align-content-center w-100">
            <div class="card shadow text-center w-75 mb-6 rounded">
                <div class="card-header text-center">

                    <h1 class="card-title">Books Details</h1>
                </div>
                <div class="card-body">
                    <h1 class="card-title">{{ $book->title }}</h1>
                    <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                    <p class="card-text"><strong>Genres:</strong>
                        @foreach ($book->genres as $genre)
                        {{ $genre->genre_name }}
                        @if (!$loop->last)
                        ,
                        @endif
                        @endforeach
                    </p>
                    <p class="card-text"><strong>issued : </strong>
                        @if($book->issuedBooksDetails->isNotEmpty())
                        <span style="color: red;">Issued</span>
                        @else
                        <span style="color: green;">Available</span>
                        @endif
                    </p>
                    <!-- <a href="{{ route('admin.books.index') }}" class="btn btn-primary">Back</a> -->
                </div>
            </div>
        </div>
    </div>

</x-app-layout>