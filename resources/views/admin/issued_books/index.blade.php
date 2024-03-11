<!-- resources/views/issued_books/index.blade.php -->

<x-app-layout>
    <div class="container">
        <h2>Issued Books</h2>
        <a href="{{ route('admin.issued_books.create') }}" class="btn btn-success mb-2">Add Issued Book</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Library Card</th>
                    <th>Issued Date</th>
                    <th>Fixed Return Date</th>
                    <th>is Returned ? </th>
                    <th>Return Date At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($issuedBooks as $issuedBook)
                    <tr>
                        <td>{{ $issuedBook->libraryCard->name }} - {{ $issuedBook->libraryCard->user->name }}</td>
                        <td>{{ $issuedBook->issued_date }}</td>
                        <td>{{ $issuedBook->fixed_return_date }}</td>
                        <td>{{ $issuedBook->is_returned ? 'yes':'no' }}</td>
                        <td>{{ $issuedBook->return_date_at ?: '-' }}</td>
                        <td>
                            <a href="{{ route('admin.issued_books.edit', $issuedBook->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('admin.issued_books.show', $issuedBook->id) }}" class="btn btn-info">View</a>
                            <form action="{{ route('admin.issued_books.destroy', $issuedBook->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this issued book?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
