<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $hidden = ['pivot','books_count'];

    public function books(){
        return $this->belongsToMany(Book::class);
    }
}
