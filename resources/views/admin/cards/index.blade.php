<!-- resources/views/cards/index.blade.php -->

<x-app-layout>
  
    <div class="container mt-4">
    <h2>Library Cards</h2>
        <a href="{{ route('admin.cards.create') }}" class="btn btn-success">Create Library Card</a>
    </div>

    <div class="container mt-4">
        

        <!-- @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif -->

        @if($cards->isEmpty())
            <p>No library cards available.</p>
        @else
            <table class="table table-bordered">
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
                                <a href="{{ route('admin.cards.show', $card->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('admin.cards.edit', $card->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('admin.cards.destroy', $card->id) }}" method="post" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this card?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
