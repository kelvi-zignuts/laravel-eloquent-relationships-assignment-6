<x-app-layout>
<div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 50%;">
            <div class="card-body">
                <h1 class="card-title text-center">Add New Book</h1>
                <form action="{{ route('admin.books.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author">
                    </div>
                    <button class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>