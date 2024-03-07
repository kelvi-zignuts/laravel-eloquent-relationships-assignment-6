<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryCard extends Model
{
    use HasFactory;

    protected $fillable = ['card_id','user_id', 'name', 'issued_date', 'expiry_date'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
