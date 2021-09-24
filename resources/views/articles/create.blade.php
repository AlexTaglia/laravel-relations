@extends('template.app')

@section('content')

<div class="mt-5 pt-2">

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
        <div class="form-group mb-4">
            <label for="title">Titolo:</label>
            <input class="form-control" type="text" name="title" id="title" maxlength="255">
        </div>

        <div class="form-group mb-4">
            <label for="title">Contenuto:</label>
            <input class="form-control" type="text" name="content" id="content">
        </div>

        <div class="form-group mb-4">
            <label for="img">Immagine:</label>
            <input class="form-control" type="text" name="img" id="img">
        </div>

        <div class="form-group mb-4">
        <label for="author_id">Autore</label>
            <select class="form-control" id="author_id" name="author_id">
            <option selected>Scegli un autore...</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{ $author->name }} {{ $author->surname }}</option>
                    @endforeach
            </select>
        </div>

        <p>Sciegli un tag:</p>
        <div class="form-group row mb-4">
            @foreach($tags as $tag)
                <div class="col-3">
                    <input name="tags[]" type="checkbox" value="{{ $tag->id }}">
                    <label>{{$tag->name}}</label>
                </div>
            @endforeach
        </div>

        <div class="form-group pb-4">
            <input type="submit" value="Salva">
        </div>

    </form>

</div>

@endsection