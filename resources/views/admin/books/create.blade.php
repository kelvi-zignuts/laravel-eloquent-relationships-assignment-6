<x-app-layout>
    <div class="container mt-4 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 50%;">
            <div class="card-body">
                <h1 class="card-title text-center">Add New Book</h1>
                <form action="{{ route('admin.books.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div><br>
                    <div class="form-group ">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" id="author" name="author" required>
                    </div><br>
                    <!-- <div class="form-group">
                        <label for="genres">Genres:</label>
                        <select name="genres[]" class="form-control" >
                            <option value="" selected disabled>Choose Genre</option>
                            
                        </select>
                    </div> -->
                    <div class="form-group mb-3">
                        <label for="select2Multiple">Genres:</label>
                        <select class="select2-multiple form-control" name="genres[]" multiple="multiple"
                            id="select2Multiple" required>
                            @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->genre_Name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary mt-3">Submit</button>
            </div>

            </form>
        </div>
    </div>
    </div>
    <!-- <script>
        setTimeout(function () {
            let errorAlert = document.getElementById('errorAlert');
            if (errorAlert) {
                errorAlert.style.display = 'none'; // Hide the alert after a delay
            }
        }, 2000);
    </script> -->
</x-app-layout>