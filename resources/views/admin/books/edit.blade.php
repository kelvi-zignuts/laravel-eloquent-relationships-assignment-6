<x-app-layout>
    <div class="container mt-4">
        <a href="{{ route('admin.books.index') }}" class="btn btn-primary" style="margin-left: 10px; margin-bottom: 10px;">Back</a>
    </div>
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 50%; margin-top: 20px;">
            <div class="card-header text-center">
                <h1 class="card-title">Edit Book</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.books.update', $book->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $book->Title }}">
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author" value="{{ $book->Author }}">
                    </div>
                    <div class="form-group">
                        <label for="genres">Genres:</label>
                        <select name="genres[]" class="form-control">
                            <option value="" disabled>Choose Genre</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}" {{ in_array($genre->id, $book->genres->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $genre->genre_Name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary" style="margin-top: 10px;">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
