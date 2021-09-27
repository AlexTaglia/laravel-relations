@extends('template.app')

@section('content')
<div class="row">
  
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
                    
                    <div class="row">
                        @foreach ($article->tag as $tag)
                        <div class="chip {{ $tag->name }}">
                            {{ $tag->name }}
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <a href=" {{ route('article.show', $article) }}">
                                <button>
                                    more
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
            @endforeach
        </article>
        <div class="col-12">
    
            @foreach ($articles as $article)
                {{ $article->name }}
            @endforeach
    
            {{ $articles->onEachSide(1)->links() }}
        </div>
    </div>
    @endsection