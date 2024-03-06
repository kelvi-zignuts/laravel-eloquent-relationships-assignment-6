<x-app-layout>
    <div class="container mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-primary"
            style="margin-left:10px; marign-bottom:10px;">Back</a>

    </div>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="card-title">All Books</h1>
                <a href="{{ route('admin.books.create') }}" class="btn btn-primary">Add New Book</a>
            </div>
            <div class="card-body">
                <!-- <a href="{{ route('admin.books.create') }}" class="btn btn-primary">Add New Book</a> -->
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th class="text-center">Title</th>
                            <th class="text-center">Author</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td class="text-center">{{$book->Title }}</td>
                            <td class="text-center">{{$book->Author}}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.books.show',$book->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('admin.books.edit',$book->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('admin.books.destroy',$book->id) }}" method="post"
                                    style="display:inline;">
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>