@extends('layout.app')
@section('content')
    <div class="container">
        <form action="{{route('author.update',['author'=>$author->id])}}" method="post">
            @csrf
            @method('patch')
            <label>Имя автора:
                <input type="text" name="name">
            </label>
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
