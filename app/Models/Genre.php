<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Genre extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'genre_name',
        'description',
        'created_by',
        'updated_by',
    ];
    public function books()
    {
        return $this->belongsToMany(Book::class,'book_genre');
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
