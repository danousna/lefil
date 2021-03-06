@extends('main')

@section('title', "$article->title")

@section('content')

<!-- Page Header -->
<header class="masthead post">
    <div class="bg-blurry" @if ($article->image != "") style="background-image: url('{{ asset('storage/'.$article->image) }}'); opacity: 0.4" @endif></div>
    <div class="container">
        <div class="row">
            <div class="post col-md-8 col-12 my-4 p-4">
                <div class="post-heading text-center">
                    <?php $date = explode('-', substr($article->created_at, 0, 10)); ?>
                    <a href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $article->slug }}">
                        <h1 class="title" style="font-size: 3rem; color: white;">{{ $article->title }}</h1>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-12 mx-auto p-4 text-center">
            @if ($article->issue_id)
                <b><a href="{{ route('pages.issue', $article->issue->number) }}">{{ $article->issue->number }}</a></b>
                |
            @endif
            <a class="font-italic" href="{{ route('pages.category', $article->category['id']) }}">
                {{ $article->category->name }}</a>
            |
            @if ($article->anonymous)  
                <b>
                    Anonyme
                </b>
            @else
                <a class="font-weight-bold" href="{{ route('pages.user', $article->user->username) }}">
                    {{ $article->user->username }}
                </a>
            @endif
            |
            {{ date('d/m/Y', strtotime($article->created_at)) }}

            <hr>

            <form method="POST" action="{{ route('articles.destroy', $article->id) }}">
                {{ csrf_field() }}
                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary mb-1">Modifier</a>
                <input type="submit" value="Supprimer" class="btn btn-danger mb-1">
                {{ method_field('DELETE') }}
            </form>
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble article">
            {!! $article->body !!}
        </div>
    </div>
</div>

@endsection