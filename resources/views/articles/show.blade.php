@extends('main')

@section('title', "$article->title")

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            <?php $date = explode('-', substr($article->created_at, 0, 10)); ?>
            <a href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $article->slug }}"><h1>{{ $article->title }}</h1></a>
            <a class="font-italic" href="{{ route('pages.category', $article->category['id']) }}">
                {{ $article->category->name }}</a>
            |
            <a class="font-weight-bold" href="{{ route('pages.user', $article->user->username) }}">
                {{ $article->user->username }}</a>
            |
            {{ date('d/m/Y', strtotime($article->created_at)) }}
            |
            9 commentaires

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
        <div class="div-bubble col-xl-6 col-lg-8 col-11 mx-auto my-4 p-4 article">
            {!! $article->body !!}
        </div>
    </div>
</div>

@endsection