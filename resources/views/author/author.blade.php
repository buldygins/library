@extends('layout.app')
@section('content')

    <div class="container">
        <h1>{{$author->name}}</h1>
        <div class="row">
        <div class="col-9">
            <h4>Knigi</h4>
            <span>Написано книг: {!! count($books) !!}</span>
            @foreach($books as $book)
                <div class="row">
                    <span>Название книги: {{$book->title}}</span><br>
                    <span>Цена: {{$book->price}}</span><br><hr>
                </div>
            @endforeach
        </div>
        <div class="col-3">
            <a href="{{route('author.edit',['author'=>$author->id])}}">Редактировать данные автора</a>
        </div>
        </div>
    </div>
@endsection

