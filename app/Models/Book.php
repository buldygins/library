<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $hidden = ['author'];


    public function author(){
        return $this->belongsToMany(Author::class);
    }

    public function assignAuthor(Author $author)
    {
        return $this->author()->save($author);
    }
}
