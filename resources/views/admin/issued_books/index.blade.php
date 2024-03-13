<x-app-layout>
    <div class="container mt-4 d-flex justify-content-center align-items-center">
       
        <div class="card shadow" style="width: 90%; border-radius: 10px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="card-title">Issued Books</h1>

                <a href="{{ route('admin.issued_books.create') }}" class="btn btn-primary">Add Issued Book</a>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th>Library Card</th>
                            <th>Issued Date</th>
                            <th>Fixed Return Date</th>
                            <th>is Returned ? </th>
                            <th>Return Date At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($issuedBooks->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center" style="color:red;">No data available</td>
                        </tr>
                        @else
                        @foreach($issuedBooks as $issuedBook)
                        <tr class="text-center">
                            <td>{{ $issuedBook->libraryCard->card_id }} - {{ $issuedBook->libraryCard->name }}</td>
                            <td>{{ date('d/m/Y ', strtotime($issuedBook->issued_date))}}</td>
                            <td>{{ date('d/m/Y ', strtotime($issuedBook->fixed_return_date))}}</td>
                            <td>{{ $issuedBook->is_returned ? 'yes':'no' }}</td>
                            <td>{{ $issuedBook->is_returned ? $issuedBook->return_date_at : '-' }}</td>
                            <td>
                                <a href="{{ route('admin.issued_books.edit', $issuedBook->id) }}"
                                    style="margin-right: 40px; color:blue;">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{route('admin.issued_books.destroy', $issuedBook->id) }}" method="post"
                                    style="display:inline; margin-right: 40px; color:red;">
                                    @csrf
                                    <button onclick="return confirm('Are you sure you want to delete this book?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <a href="{{ route('admin.issued_books.show', $issuedBook->id) }}"
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