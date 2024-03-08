<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssuedBooksDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'issued_date',
        'fixed_return_date',
        'is_returned',
        'return_date_at',
    ];

    public function libraryCard()
    {
        return $this->belongsTo(LibraryCard::class, 'card_id');
    }
    public function books()
{
    return $this->belongsToMany(Book::class, 'issued_books', 'issued_books_detail_id', 'book_id');
}
}
