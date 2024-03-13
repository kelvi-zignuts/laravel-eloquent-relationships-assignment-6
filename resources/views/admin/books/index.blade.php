<x-app-layout>
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card shadow" style="width: 70%; border-radius: 10px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="card-title">All Books</h1>
                <a href="{{ route('admin.books.create') }}" class="btn btn-primary">Add Book</a>
            </div>
            <div class="card-body">
                <table class="table mt-3">
                    <thead>
                        <tr class="text-center">
                            <th>Title</th>
                            <th>Author</th>
                            <th>Issued</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($books->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center" style="color:red;">No books available</td>
                        </tr>
                        @else
                        @foreach ($books as $book)
                        <tr class="text-center">
                            <td>{{$book->title }}</td>
                            <td>{{$book->author}}</td>
                            <td>
                                @if($book->issuedBooksDetails->isNotEmpty())
                                <span style="color: red;">Issued</span>
                                @else
                                <span style="color: green;">Available</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.books.edit',$book->id)}}"
                                    style="margin-right: 40px; color:blue;">
                                    <i class="fas fa-pencil-alt mr-40 "></i>
                                </a>
                                <form action="{{ route('admin.books.destroy', $book->id) }}" method="post"
                                    style="display:inline; margin-right: 40px; color:red;"
                                    id="deleteForm{{ $book->id }}">
                                    @csrf
                                    <button type="button" onclick="confirmDelete('{{ $book->id }}')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <a href="{{  route('admin.books.show',$book->id) }}"
                                    style="margin-right: 40px;color:blue;">
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