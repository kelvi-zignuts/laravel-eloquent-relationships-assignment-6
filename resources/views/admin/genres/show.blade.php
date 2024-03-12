<x-app-layout>
    <div class="container mt-4">
        <a href="{{ route('admin.genres.index') }}" class="btn btn-primary"
            style="margin-left: 10px; margin-bottom: 10px;">Back</a>
    </div>
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 50%; margin-top: 20px;">
            <div class="card-header text-center">
                <h1 class="card-title">Genres Details</h1>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $genre->genre_name }}</p>
                <p><strong>Description:</strong> {{ $genre->description }}</p>
            </div>
        </div>
    </div>
</x-app-layout>