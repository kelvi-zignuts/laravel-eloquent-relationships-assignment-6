<x-app-layout>
    <!-- <div class="container mt-4">
        <a href="{{ route('admin.cards.index') }}" class="btn btn-primary"
            style="margin-left: 10px; margin-bottom: 10px;">Back</a>
    </div> -->
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card shadow" style="width: 50%; margin-top: 20px;  border-radius: 10px;">
            <div class="card-header text-center">
                <h1 class="card-title">Edit Library Card</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.cards.update', $card->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $card->name }}">
                    </div>
                    <div class="form-group">
                        <label for="issued_date">Issued Date</label>
                        <input type="date" class="form-control" id="issued_date" name="issued_date"
                            value="{{ $card->issued_date }}">
                    </div>
                    <div class="form-group">
                        <label for="expiry_date">Expiry Date</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                            value="{{ $card->expiry_date }}">
                    </div>
                    <button class="btn btn-primary" style="margin-top: 10px;">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>