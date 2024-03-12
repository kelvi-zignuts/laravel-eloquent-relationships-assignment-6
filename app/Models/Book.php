<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'author',
        'created_by',
        'updated_by',
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
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
