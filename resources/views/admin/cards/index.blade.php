<x-app-layout>
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card shadow" style="width: 80%; border-radius: 10px;">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="card-title">Library Cards</h1>

                <a href="{{ route('admin.cards.create') }}" class="btn btn-primary">Create Users</a>
            </div>
            <div class="card-body">
                <table class="table mt-3">
                    <thead>
                        <tr class="text-center">
                            <th>Card ID</th>
                            <th>Name</th>
                            <th>Issued Date</th>
                            <th>Expiry Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($cards->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center" style="color:red;">No cards available</td>
                        </tr>
                        @else
                        @foreach($cards as $card)
                        <tr class="text-center">
                            <td>{{ $card->card_id }}</td>
                            <td>{{ $card->name }}</td>
                            <td>{{ date('d/m/Y ', strtotime($card->issued_date)) }}</td>
                            <td>{{ date('d/m/Y ', strtotime($card->expiry_date)) }}</td>
                            <td>
                                <a href="{{ route('admin.cards.edit', $card->id) }}"
                                    style="margin-right: 40px; color:blue;">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('admin.cards.destroy', $card->id) }}" method="post"
                                    style="display:inline; margin-right: 40px; color:red;"
                                    id="deleteForm{{ $card->id }}">
                                    @csrf
                                    <button type="button" onclick="confirmDelete('{{ $card->id }}')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <a href="{{ route('admin.cards.show', $card->id) }}"
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