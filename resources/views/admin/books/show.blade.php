<x-app-layout>
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 50%;">
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
                <!-- Add more book details as needed -->
                <a href="{{ route('admin.books.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>
