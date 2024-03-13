<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('admin.books.index') }}">Books</a>
                    <span class="ml-2 text-sm text-gray-500">({{ $booksCount }} books)</span>
                </div>
            </div>
        </div>
    </div>


    <div class="py-0.1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{route('admin.genres.index')}}">Genres</a>
                    <span class="ml-2 text-sm text-gray-500">({{ $genresCount }} genres)</span>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{route('admin.cards.index')}}">Users</a>
                    <span class="ml-2 text-sm text-gray-500">({{ $cardsCount }} user)</span>
                </div>
            </div>
        </div>
    </div>

    <div class="py-0.1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{route('admin.issued_books.index')}}">Issued Books</a>
                    <span class="ml-2 text-sm text-gray-500">({{ $issuedBooksCount }} Issued books)</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>