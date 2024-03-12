<x-app-layout>
    <div class="container mt-4">
        @if(session('success'))
        <div class="alert alert-success" id="successAlert">{{ session('success') }}</div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="card-title">All Genres</h1>
                <a href="{{ route('admin.genres.create')}}" class="btn btn-primary">Add New Genre</a>
            </div>
            <div class="card-body">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($genres as $genre)
                        <tr>
                            <td class="text-center">{{ $genre->genre_name }}</td>
                            <td class="text-center">{{ $genre->description }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.genres.edit', $genre->id)}}"
                                    style="margin-right: 40px; color:blue;">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('admin.genres.destroy', $genre->id) }}" method="post"
                                    style="display:inline; margin-right: 40px; color:red;">
                                    @csrf
                                    <button onclick="return confirm('Are you sure you want to delete this book?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <a href="{{ route('admin.genres.show', $genre->id) }}"
                                    style="margin-right: 40px;color:blue;">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>