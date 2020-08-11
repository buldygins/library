@extends('layout.app')
@section('content')
    <div class="container">
        <form action="{{route('book.update',['book'=>$book->id])}}" method="post">
            @csrf
            @method('patch')
            <div class="row">
                <label>Автор:
                    <select name="author">
                        <option value="" selected disabled hidden>Список наших авторов</option>
                        @foreach($authors as $author)
                            <option value="{!! $author->id !!}">{!! $author->name !!}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="row">
                <label>Название книги:
                    <input type="text" name="title">
                </label>
            </div>
            <div class="row">
                <label>Цена:
                    <input type="number" name="price" min="0" step="any" max="99999" placeholder="0,00">
                </label>
            </div>
            <div class="row">
                <label>Дата публикации:
                    <input type="date" name="publish_date">
                </label>
            </div>
            <input type="submit">
        </form>
        <div id="error"></div>
    </div>
@endsection
@section('script')
    @foreach($errors->all() as $message)
        <script>
            var message = '{!! $message !!}<br>';
            document.getElementById('error').innerHTML += message;
        </script>
    @endforeach
@endsection
