<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('book.all', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('book.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->title;
        $book->price = $request->price;
        $book->publish_date = $request->publish_date;
        $book->save();
        $author = Author::find($request->author);
        $book->author()->attach($author);
        return back()->with('message', 'done');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $author = $book->author;
        return view('book.book', compact(['book', 'author']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('book.edit', compact(['book', 'authors']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->title = $request->title;
        $book->price = $request->price;
        $book->publish_date = $request->publish_date;
        $book->author()->detach($book->author);
        $author = Author::find($request->author);
        $book->author()->attach($author);
        $book->update();
        return back()->with('message', 'done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $this->destroy();
    }

    public function indexapi()
    {
        $books = Book::all();
        $data = [''];
        foreach ($books as $book) {
            array_push($data, [$book,$book->author]);
        }

        return response()->json(['book' => $data, ], 200, [], 500);
    }

    public function showapi($id)
    {
        $book = Book::find($id);
        $data = $book;
        //return $product;

        return response()->json(['book' => $book, 'author' => $book->author[0]], 200, [], 500);
    }
}
