<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\IssuedBooksDetailController;
// use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {
        Route::prefix('books')->group(function (){
            Route::get('/', [BookController::class, 'index'])->name('admin.books.index');
            Route::get('/create', [BookController::class, 'create'])->name('admin.books.create');
            Route::post('/store', [BookController::class, 'store'])->name('admin.books.store');
            Route::get('/{book}/edit', [BookController::class, 'edit'])->name('admin.books.edit');
            Route::get('/{book}', [BookController::class, 'show'])->name('admin.books.show');
            Route::post('/{book}/update', [BookController::class, 'update'])->name('admin.books.update');
            Route::post('/{book}/delete', [BookController::class, 'destroy'])->name('admin.books.destroy');
        });
        

        Route::prefix('genres')->group(function (){
            Route::get('/', [GenreController::class, 'index'])->name('admin.genres.index');
            Route::get('/create', [GenreController::class, 'create'])->name('admin.genres.create');
            Route::post('/store', [GenreController::class, 'store'])->name('admin.genres.store');
            Route::get('/{genre}/edit', [GenreController::class, 'edit'])->name('admin.genres.edit');
            Route::get('/{genre}', [GenreController::class, 'show'])->name('admin.genres.show');
            Route::post('/{genre}/update', [GenreController::class, 'update'])->name('admin.genres.update');
            Route::post('/{genre}/delete', [GenreController::class, 'destroy'])->name('admin.genres.destroy');
        });

        Route::prefix('cards')->group(function (){
            Route::get('/', [CardController::class, 'index'])->name('admin.cards.index');
            Route::get('/create', [CardController::class, 'create'])->name('admin.cards.create');
            Route::post('/store', [CardController::class, 'store'])->name('admin.cards.store');
            Route::get('/{id}', [CardController::class, 'show'])->name('admin.cards.show');
            Route::get('/{id}/edit', [CardController::class, 'edit'])->name('admin.cards.edit');
            Route::post('/{id}/update', [CardController::class, 'update'])->name('admin.cards.update');
            Route::post('/{id}/delete', [CardController::class, 'destroy'])->name('admin.cards.destroy');
        });
        
        Route::prefix('issued_books')->group(function (){
            Route::get('/', [IssuedBooksDetailController::class, 'index'])->name('admin.issued_books.index');
            Route::get('/create', [IssuedBooksDetailController::class, 'create'])->name('admin.issued_books.create');
            Route::post('/store', [IssuedBooksDetailController::class, 'store'])->name('admin.issued_books.store');
            Route::get('/{issuedBook}', [IssuedBooksDetailController::class, 'show'])->name('admin.issued_books.show');
            Route::get('/{issuedBook}/edit', [IssuedBooksDetailController::class, 'edit'])->name('admin.issued_books.edit');
            Route::post('/{issuedBook}/update', [IssuedBooksDetailController::class, 'update'])->name('admin.issued_books.update');
            Route::post('/{issuedBook}/delete', [IssuedBooksDetailController::class, 'destroy'])->name('admin.issued_books.destroy');
        });
    });

});



require __DIR__.'/auth.php';
