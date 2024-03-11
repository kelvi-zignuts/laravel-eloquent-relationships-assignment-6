<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'Title',
        'Author',
        // 'is_issued',
    ];
    public function genres()
    {
        return $this->belongsToMany(Genre::class,'book_genre');
    }
    public function issuedBooksDetails()
    {
        return $this->belongsToMany(IssuedBooksDetail::class, 'issued_books', 'book_id', 'issued_books_detail_id');
    }
    
}
