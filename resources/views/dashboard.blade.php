<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 d-flex flex-wrap gap-3">

            <div class="card " style="width: 18rem;">
                <img class="card-img-top"
                    src="https://img.freepik.com/free-photo/creative-composition-world-book-day_23-2148883765.jpg"
                    alt="Card image" style="width: 100%; height: 100%;">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Books</h5>
                        <p class="ml-2 text-sm text-gray-500">({{ $booksCount }} books)</p>
                    </div>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the
                        card's
                        content.</p> -->
                    <a href="{{ route('admin.books.index') }}" class="btn btn-primary m-3 mt-0">Books</a>
                </div>
            </div>


            <div class="card" style="width: 18rem;">
                <img class="card-img-top"
                    src="https://support.musicgateway.com/wp-content/uploads/2021/06/most-popular-movie-genres.png"
                    alt="Card image" style="width: 100%; height: 100%;">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Genres</h5>
                        <p class="ml-2 text-sm text-gray-500">({{ $genresCount }} genres)</p>
                    </div>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the
                        card's
                        content.</p> -->
                    <a href="{{ route('admin.genres.index') }}" class="btn btn-primary m-3 mt-0">Genres</a>
                </div>
            </div>


            <div class="card" style="width: 18rem;">
                <img class="card-img-top"
                    src="https://img.freepik.com/premium-photo/team-diverse-people-doing-group-photo_53876-138423.jpg"
                    alt="Card image" style="width: 100%; height: 100%;">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Users</h5>
                        <p class="ml-2 text-sm text-gray-500">({{ $cardsCount }} user)</p>
                    </div>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the
                        card's
                        content.</p> -->
                    <a href="{{ route('admin.cards.index') }}" class="btn btn-primary m-3 mt-0">Users</a>
                </div>
            </div>


            <div class="card" style="width: 18rem;">
                <img class="card-img-top"
                    src="https://faqs.web-school.in/wp-content/uploads/2017/05/Issue-Book-640x480.jpg" alt="Card image" style="width: 100%; height: 100%;">
                <div class="card-body d-flex justify-content-between" >
                    <div>
                        <h5 class="card-title">Issued Books</h5>
                        <p class="ml-2 text-sm text-gray-500 ">({{ $issuedBooksCount }} Issued books)</p>
                    </div>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the
                        card's
                        content.</p> -->
                    <a href="{{ route('admin.issued_books.index') }}" class="btn btn-primary m-3 mt-0 btn-sm p-2">Issued Books</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>