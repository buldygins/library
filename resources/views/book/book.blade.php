@extends('layout.app')
@section('content')

    <div class="container">
        <h1>{{$book->title}}</h1>
        <div class="row">
            <div class="col-9">
                    <div class="row">
                        <span>Автор: {{$author[0]->name}}</span><br>
                        <span>Цена: {{$book->price}}</span><br><hr>
                    </div>
            </div>
            <div class="col-3">
                <a href="{{route('book.edit',['book'=>$book->id])}}">Редактировать данные книги</a>
            </div>
        </div>
    </div>
@endsection

