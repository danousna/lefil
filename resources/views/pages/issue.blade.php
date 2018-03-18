@extends('main')

@section('title', "$issue->number - $issue->titre")

@section('content')

<!-- Main Content -->
<div class="bg-bubble">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-8 col-11 mx-auto">
                <div class="div-bubble my-4 p-4">
                    <h2 class="mb-4">n°{{ $issue->number }}</b> {{($issue->titre != "") ? "- ".$issue->titre : "" }}</h2>          
                    @if ($issue->articles->where('status', 'published')->count() > 0)
                        @foreach ($issue->articles->where('status', 'published')->sortBy('published_at') as $article)
                            <?php $date = explode('-', substr($article->published_at, 0, 10)); ?>

                            <div class="article">
                                <h4 class="mb-0">
                                    <a class="title" href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $article->slug }}">
                                        {{ $article->title }}
                                    </a>
                                </h4>
                                <small class="text-muted mb-0 mt-1">
                                    <a href="{{ route('pages.category', $article->category['id']) }}">
                                        {{ $article->category->name }}
                                    </a>
                                    |
                                    @if ($article->anonymous)
                                        <span>  
                                            Anonyme
                                        </span>
                                    @else
                                        <a class="font-weight-bold @if ($article->user->hasAnyRole('admin|president|member')) text-success @endif" href="{{ route('pages.user', $article->user->username) }}"> 
                                            {{ $article->user->username }}
                                        </a>
                                    @endif
                                    |
                                    {{ date('d/m/Y', strtotime($article->published_at)) }}
                                </small>
                            </div>
                            <hr>
                        @endforeach
                    @else
                        <span class="d-block text-center">Pas d'articles pour le moment.</span>
                    @endif
                </div>
            </div>

            <div class="col-md-4 col-11 mx-auto">

                <div class="div-bubble my-4 p-4">
                    <h2 class="mb-3">Version pdf :</h2>
                    @if ($issue->pdf != '')
                        <a class="pdf-link" href="{{ asset('storage/'.$issue->pdf) }}"><img style="width: 100%;" src="{{ asset('storage/'.$issue->image) }}"></a>
                    @else
                        Pas de version pdf disponible.
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

@endsection