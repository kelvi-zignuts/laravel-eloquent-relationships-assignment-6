<x-app-layout>
    <div class="container mt-4">

        @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @endif

        @if($cards->isEmpty())
        <p>No library cards available.</p>
        @else
        <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="card-title">Library Cards</h1>

                <a href="{{ route('admin.cards.create') }}" class="btn btn-primary">Create Library Card</a>
            </div>
            <div class="card-body">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Card ID</th>
                            <th>Name</th>
                            <th>Issued Date</th>
                            <th>Expiry Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cards as $card)
                        <tr>
                            <td>{{ $card->card_id }}</td>
                            <td>{{ $card->name }}</td>
                            <td>{{ $card->issued_date }}</td>
                            <td>{{ $card->expiry_date }}</td>
                            <td>
                                <a href="{{ route('admin.cards.show', $card->id) }}"
                                    class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('admin.cards.edit', $card->id) }}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('admin.cards.destroy', $card->id) }}" method="post"
                                    style="display: inline-block;">
                                    @csrf
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this card?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        @endif
    </div>
</x-app-layout>