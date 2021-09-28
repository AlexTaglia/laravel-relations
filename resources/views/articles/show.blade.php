@extends('template.app')

@section('content')
<div class="row">

    @if ($errors->any())
    <ul>
    @foreach ($errors->all() as $error)
        <li> {{ $error }}</li>
    @endforeach
    </ul>
    @endif

    </div>

    <article class="col-12 mt-5 pt-5 pb-5">
            <div class="row article m-3 p-2">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <h2>{{ $article->title }}</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <!-- <img class="img-fluid" src="{{ $article->img }}" alt=""> -->
                            <img  class="img-fluid" src="{{ asset('storage/'. $article->img) }}" alt="">

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

                    <div class="row mb-4">
                        @foreach ($article->tag as $tag)
                            <div class="chip {{ $tag->name }}">
                                {{ $tag->name }}
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('comment.store', ['id'=>$article->id] ) }}" method='POST'>

                            @csrf
                                <div class="form-group">
                                    <label for="comment">Lascia un commento:</label>
                                    <textarea class="form-control mb-3" name="comment" id="comment" rows="3" placeholder="Lascia un commento"></textarea>
                                    <button type="submit">Pubblica</button>
                                </div>    
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        @foreach ($article->comment as $comment)
                            <p> {{ $comment->comment }}</p>
                            <p> {{ $comment->created_at }}</p>
                            <hr>
                        @endforeach
                    </div>
                </div>

            </div>

    </article>
</div>
@endsection