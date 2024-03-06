<x-app-layout>
    <h1>{{ $genre->genre_Name }}</h1>
    <p><strong>Description:</strong> {{ $genre->Description }}</p>
    <!-- Add more genre details as needed -->
    <a href="{{ route('admin.genres.index') }}" class="btn btn-primary">Back</a>
</x-app-layout>