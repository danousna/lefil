@extends('main')

@section('title', "$issue->number - $issue->titre")

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            <h2>{{ $issue->number }} - {{ $issue->titre }}</h2>
        </div>
    </div>
    <div class="row py-4 pb-5 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-10 mx-auto my-4 p-4">
            
            @if ($issue->articles->where('status', 'published')->count() > 0)
                @foreach ($issue->articles->where('status', 'published') as $article)
                    <?php $date = explode('-', substr($article->created_at, 0, 10)); ?>

                    <div class="article">
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
                            {{ date('d/m/Y', strtotime($article->created_at)) }}
                        </small>
                    </div>
                    <hr>
                @endforeach
            @else
                <span class="d-block text-center">Pas d'articles pour le moment.</span>
            @endif

        </div>
    </div>
</div>

@endsection