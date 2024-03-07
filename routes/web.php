<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CardController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::get('books', [BookController::class, 'index'])->name('admin.books.index');
    Route::get('books/create', [BookController::class, 'create'])->name('admin.books.create');
    Route::post('books', [BookController::class, 'store'])->name('admin.books.store');
    Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('admin.books.edit');
    Route::get('books/{book}', [BookController::class, 'show'])->name('admin.books.show');
    Route::post('books/{book}/update', [BookController::class, 'update'])->name('admin.books.update');
    Route::post('books/{book}/delete', [BookController::class, 'destroy'])->name('admin.books.destroy');

    Route::get('genres', [GenreController::class, 'index'])->name('admin.genres.index');
    Route::get('genres/create', [GenreController::class, 'create'])->name('admin.genres.create');
    Route::post('genres', [GenreController::class, 'store'])->name('admin.genres.store');
    Route::get('genres/{genre}/edit', [GenreController::class, 'edit'])->name('admin.genres.edit');
    Route::get('genres/{genre}', [GenreController::class, 'show'])->name('admin.genres.show');
    Route::post('genres/{genre}/update', [GenreController::class, 'update'])->name('admin.genres.update');
    Route::post('genres/{genre}/delete', [GenreController::class, 'destroy'])->name('admin.genres.destroy');

    Route::get('/cards', [CardController::class, 'index'])->name('admin.cards.index');
    Route::get('/cards/create', [CardController::class, 'create'])->name('admin.cards.create');
    Route::post('/cards', [CardController::class, 'store'])->name('admin.cards.store');
    Route::get('/cards/{id}', [CardController::class, 'show'])->name('admin.cards.show');
    Route::get('/cards/{id}/edit', [CardController::class, 'edit'])->name('admin.cards.edit');
    Route::put('/cards/{id}', [CardController::class, 'update'])->name('admin.cards.update');
    Route::delete('/cards/{id}', [CardController::class, 'destroy'])->name('admin.cards.destroy');
    // Add more admin routes as needed
});
// Route::get('/home', [HomeController::class,'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
