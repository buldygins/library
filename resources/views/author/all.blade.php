@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 ">
                @foreach($authors as $author)
                    <div class="container border row">
                        <a href="{{route('author.show',['author'=> $author->id])}}">{!! $author->name !!}</a>
                    </div>
                @endforeach
            </div>
            <div class="col-2">
                <a href="{{route('author.create')}}">Добавить автора</a>
            </div>
        </div>
    </div>
@endsection
