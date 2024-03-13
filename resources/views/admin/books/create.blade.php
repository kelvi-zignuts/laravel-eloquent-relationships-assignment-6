<x-app-layout>
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card shadow" style="width: 50%;  border-radius: 10px;">
            <div class="card-header text-center">
                <h1 class="card-title">Add Book</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.books.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div><br>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author" required>
                        <x-input-error :messages="$errors->get('author')" class="mt-2" />
                    </div><br>
                    <div class="form-group mb-3">
                        <label for="select2Multiple">Genres:</label>
                        <select class="select2-multiple form-control" name="genres[]" multiple="multiple"
                            id="select2Multiple" required>
                            @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('genres')" class="mt-2" />
                    </div>
                    <button class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>