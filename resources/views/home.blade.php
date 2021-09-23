@extends('template.app')

@section('content')
<div class="row">

    <div class="col-12 fixed-top mt-1">

        @foreach ($articles as $article)
            {{ $article->name }}
        @endforeach

        {{ $articles->links() }}
    </div>

    <div class="col-12 mt-5">
        <a href="{{ route('article.create') }}"> Add Article</a>
    </div>

    <article class="col-12 mt-5">
        @foreach($articles as $article)
            <div class="row article m-3 p-2">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <h2>{{ $article->title }}</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <img class="img-fluid" src="{{ $article->img }}" alt="">
                        </div>
        
                        <div class="col-8">
                            <p>{{ $article->content}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-secondary mb-0">{{ $article->author->name }} {{ $article->author->surname }}</p>
                            <p class="text-secondary">{{ $article->author->email }}</p>           
                            <p class="text-secondary">{{ $article->created_at }}</p>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </article>
</div>
@endsection