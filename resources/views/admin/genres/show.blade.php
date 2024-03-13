<x-app-layout>
    <!-- <div class="container mt-4">
        <a href="{{ route('admin.genres.index') }}" class="btn btn-primary"
            style="margin-left: 10px; margin-bottom: 10px;">Back</a>
    </div> -->
    <div class="container bg-white p-6 mt-16 w-50 rounded">
        <div class="mt-3" style="color:blue;">
            <a href="{{route('admin.genres.index')}}"><i class="fas fa-arrow-circle-left"
                    style="margin-left:70px; font-size:30px;"></i></a>
        </div>
        <div class="container mt-4 d-flex justify-content-center align-content-center w-100">
            <div class="card card shadow text-center w-75 mb-6 rounded">
                <div class="card-header text-center">
                    <h1 class="card-title">Genres Details</h1>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $genre->genre_name }}</p>
                    <p><strong>Description:</strong> {{ $genre->description }}</p>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>