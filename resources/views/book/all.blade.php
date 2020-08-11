@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                @foreach($books as $book)
                    <div class="container border row">
                        <a href="{{route('book.show',['book'=> $book->id])}}">{!! $book->title !!}</a>
                    </div>
                @endforeach
            </div>
            <div class="col-2">
                <a href="{{route('book.create')}}">Добавить книгу</a>
            </div>
        </div>
    </div>
@endsection
