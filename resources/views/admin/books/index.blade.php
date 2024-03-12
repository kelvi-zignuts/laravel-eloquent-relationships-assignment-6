<x-app-layout>
    <div class="container mt-4">
        @if(session('success'))
        <div class="alert alert-success" id="successAlert">{{ session('success') }}</div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="card-title">All Books</h1>

                <a href="{{ route('admin.books.create') }}" class="btn btn-primary">Add New Book</a>
            </div>
            <div class="card-body">
                <!-- <a href="{{ route('admin.books.create') }}" class="btn btn-primary">Add New Book</a> -->
                <table class="table mt-3">
                    <thead>
                        <tr class="text-center">
                            <th >Title</th>
                            <th >Author</th>
                            <th >Issued</th>
                            <th >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        <tr class="text-center">
                            <td >{{$book->title }}</td>
                            <td >{{$book->author}}</td>
                            <td >
                                @if($book->issuedBooksDetails->isNotEmpty())
                                <span style="color: red;">Issued</span>
                                @else
                                <span style="color: green;">Available</span>
                                @endif
                            </td>
                            <!-- <td class="text-center">
                                <a href="{{ route('admin.books.show',$book->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('admin.books.edit',$book->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('admin.books.destroy',$book->id) }}" method="post"
                                    style="display:inline;">
                                    @csrf
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this card?')">Delete</button>
                                </form>
                            </td> -->
                            <td >
                                <a href="{{route('admin.books.edit',$book->id)}}" style="margin-right: 40px; color:blue;">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('admin.books.destroy',$book->id) }}" method="post"
                                    style="display:inline; margin-right: 40px; color:red;">
                                    @csrf
                                    <button onclick="return confirm('Are you sure you want to delete this book?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <a href="{{  route('admin.books.show',$book->id) }}" style="margin-right: 40px;color:blue;">
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