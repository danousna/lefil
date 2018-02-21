@extends('main')

@section('title', "$category->name")

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            <h2>{{ $category->name }}</h2>
        </div>
    </div>
    <div class="row py-4 pb-5 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-10 mx-auto my-4 p-4">

            @foreach ($articles->slice(0, $articles->count()) as $article)
                <?php $date = explode('-', substr($article->created_at, 0, 10)); ?>

                <div class="article">
                    <h5 class="mb-0">
                        <a href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $article->slug }}">
                            {{ $article->title }}
                        </a>
                    </h5>
                    <small class="text-muted mb-0 mt-1">
                        <span class="font-italic" href="{{ route('pages.category', $article->category['id']) }}">
                            {{ $article->category->name }}
                        </span>
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

        </div>
    </div>
</div>

@endsection