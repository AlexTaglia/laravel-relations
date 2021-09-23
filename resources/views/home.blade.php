@extends('template.app')

@section('content')
<div class="row">
    <article class="col-12 card mt-5">
        @foreach($articles as $article)
            <div class="row card m-3 p-2">
                <div class="col-10">
                    <h2>{{ $article->title }}</h2>
                    <p>{{ $article->created_at }}</p>
                    <p>{{ $article->content}}</p>
                    <p>{{ $article->author->name }} {{ $article->author->surname }}</p>
                    <p>{{ $article->author->email }}</p>           
                </div>
                <div class="col-2">
                    <img class="img-fluid" src="{{ $article->img }}" alt="">
                </div>
            </div>
        @endforeach
    </article>
</div>
@endsection