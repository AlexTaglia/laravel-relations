@extends('template.app')

@section('content')

<div class="mt-5">

<a href="{{ url('/home') }}"> Home </a>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="mt-5" action="{{route('article.store')}}" method='post'>
        @csrf
        <div class="form-group">
            <label for="title">Titolo:</label>
            <input class="form-control" type="text" name="title" id="title" maxlength="255">
        </div>

        <div class="form-group">
            <label for="title">Contenuto:</label>
            <input class="form-control" type="text" name="content" id="content">
        </div>

        <div class="form-group">
            <label for="img">Immagine:</label>
            <input class="form-control" type="text" name="img" id="img">
        </div>

        <div class="form-group">
        <label for="author_id">Autore</label>
            <select class="form-control" id="author_id" name="author_id">
            <option selected>Scegli un autore...</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{ $author->name }} {{ $author->surname }}</option>
                    @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="submit" value="Salva">
        </div>

    </form>

</div>

@endsection