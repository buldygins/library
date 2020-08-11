<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class test extends Controller
{
    public  function test(){
        dump(Carbon::now()->format('Y-m-d'));
        $books = Book::all()->where('publish_date','<', Carbon::now()->subYear(1));
        dd($books);
    }
}
