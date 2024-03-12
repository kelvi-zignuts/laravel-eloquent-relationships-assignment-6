<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class IssuedBooksDetail extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'card_id',
        'issued_date',
        'fixed_return_date',
        'is_returned',
        'return_date_at',
        'created_by',
        'updated_by',
    ];

    //in this table we have same card_id with different book details
    public function libraryCard()
    {
        return $this->belongsTo(LibraryCard::class, 'card_id');
    }

    //pivot table (including book_id,issued_books_detail_id)
    public function books()
    {
        return $this->belongsToMany(Book::class, 'issued_books', 'issued_books_detail_id', 'book_id');
    }

    //created_by
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    //updated_by
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
