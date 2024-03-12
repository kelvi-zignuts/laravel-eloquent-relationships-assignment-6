<x-app-layout>
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 50%;">
            <div class="card-body">
                <h1 class="card-title text-center">Add New Genre</h1>
                <form action="{{ route('admin.genres.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="genre_name">Name</label>
                        <input type="text" class="form-control" id="genre_name" name="genre_name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <button class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>