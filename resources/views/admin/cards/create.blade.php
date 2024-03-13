<x-app-layout>
    <!-- <div class="container mt-4">
        <a href="{{ route('admin.cards.index') }}" class="btn btn-primary"
            style="margin-left: 10px; margin-bottom: 10px;">Back</a>
    </div> -->
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 50%;  border-radius: 10px;">
            <div class="card-header text-center">
                <h1 class="card-title">Create Library Card</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.cards.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <label for="issued_date">Issued Date</label>
                        <input type="date" class="form-control" id="issued_date" name="issued_date"
                            value="{{ now()->toDateString() }}" required>
                            <!-- <x-input-error :messages="$errors->get('issued_date')" class="mt-2" /> -->
                    </div>
                    <div class="form-group">
                        <label for="expiry_date">Expiry Date</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                            value="{{ now()->addYear()->toDateString() }}" required>
                            <!-- <x-input-error :messages="$errors->get('expiry_date')" class="mt-2" /> -->
                    </div>
                    <button class="btn btn-primary" style="margin-top: 10px;">Create</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>