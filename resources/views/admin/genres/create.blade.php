<x-app-layout>
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card shadow" style="width: 50%;  border-radius: 10px;">
        <div class="card-header text-center">
                    <h1 class="card-title">Add Genres</h1>
                </div>
            <div class="card-body">
                <form action="{{ route('admin.genres.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="genre_name">Name</label>
                        <input type="text" class="form-control" id="genre_name" name="genre_name" required>
                        <x-input-error :messages="$errors->get('genre_name')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <button class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
