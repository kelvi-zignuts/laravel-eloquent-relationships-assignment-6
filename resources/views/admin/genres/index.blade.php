<x-app-layout>
    <div class="container mt-16 d-flex justify-content-center align-items-center">
        <div class="card shadow" style="width: 70%; border-radius: 10px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="card-title">All Genres</h1>
                <a href="{{ route('admin.genres.create') }}" class="btn btn-primary"> Add Genre</a>
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
                        @if($genres->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center" style="color:red;">No genres available</td>
                        </tr>
                        @else
                        @foreach ($genres as $genre)
                        <tr>
                            <td class="text-center">{{ $genre->genre_name }}</td>
                            <td class="text-center">{{ $genre->description }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.genres.edit', $genre->id)}}"
                                    style="color:blue;margin-right: 40px">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('admin.genres.destroy', $genre->id) }}" method="post"
                                    style="display:inline; color:red; margin-right: 40px;"
                                    id="deleteForm{{ $genre->id }}">
                                    @csrf
                                    <button type="button" onclick="confirmDelete('{{ $genre->id }}')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <a href="{{ route('admin.genres.show', $genre->id) }}"
                                    style="color:blue;margin-right: 40px">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>