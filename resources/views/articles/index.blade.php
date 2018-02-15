@extends('main')

@section('title', 'Mes Articles')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            Tous mes articles
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="col-xl-6 col-lg-8 col-10 mx-auto">
            @foreach ($articles as $article)
                <?php $date = explode('-', substr($article->created_at, 0, 10)); ?>
                <div class="div-bubble article p-4 my-4">
                    <h5 class="mb-0">
                        <a href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $article->slug }}">
                            {{ $article->title }}
                        </a>
                    </h5>
                    <small class="text-muted mb-0 mt-1">
                        <a class="font-italic" href="{{ route('pages.category', $article->category['id']) }}">
                            {{ $article->category->name }}
                        </a>
                        |
                        {{ date('d/m/Y', strtotime($article->created_at)) }}
                        |
                        @if ($article->status == 'draft')
                            Brouillon
                        @endif
                        @if ($article->status == 'published')
                            <span class="text-success">Publié</span>
                        @endif
                    </small>
                    <hr>
                    <form method="POST" action="{{ route('articles.destroy', $article->id) }}">
                        {{ csrf_field() }}
                        @if ($article->status == 'draft')
                            <a href="{{ route('articles.publish', $article->id) }}" class="btn btn-success btn-sm">
                                Publier
                            </a>
                        @endif
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-secondary btn-sm">
                            Voir
                        </a>
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-secondary btn-sm">
                            Modifier
                        </a>
                        <input type="submit" value="Supprimer" class="btn btn-danger btn-sm">
                        {{ method_field('DELETE') }}
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection