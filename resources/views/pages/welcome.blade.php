@extends('main')

@section('title', 'Accueil')

@section('content')

<!-- Page Header -->
<header class="masthead">
    <div id="heroesArticle" class="carousel slide" data-ride="carousel" data-interval='false'>
        <ol class="carousel-indicators">
            <li data-target="#heroesArticle" data-slide-to="0" class="active"></li>
            <li data-target="#heroesArticle" data-slide-to="1"></li>
            <li data-target="#heroesArticle" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            @foreach ($articles->slice(0, 3) as $article)
                <div class="carousel-item {{ ($article == $articles->first()) ? "active" : "" }} " style="height: 100%">
                    <div class="bg-blurry" @if ($article->image != "") style="background-image: url('{{ asset('storage/blur-'.$article->image) }}');" @endif></div>
                    <div class="container-fluid">
                        <div class="row"> 
                            <?php $date = explode('-', substr($article->created_at, 0, 10)); ?>
                            <a class="d-block col-xl-6 col-lg-8 col-10 mx-auto mt-4 hero px-0" href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $article->slug }}" @if ($article->image != "") style="background-image: url('{{ asset('storage/'.$article->image) }}');" @endif>
                                <div class="bg-white p-4 title">
                                    <h2>
                                        {{ $article->title }}
                                    </h2>
                                    <h4 class="font-weight-normal subtitle">
                                        <i>{{ $article->category->name }}</i>
                                        |
                                        @if ($article->anonymous)
                                            <span>  
                                                Anonyme
                                            </span>
                                        @else    
                                            <span class="@if ($article->user->hasAnyRole('admin|president|member')) text-success @endif">  
                                                {{ $article->user->username }}
                                            </span>
                                        @endif
                                        |
                                        {{ date('d/m/Y', strtotime($article->created_at)) }}
                                        |
                                        {{ $article->comments()->count() }} commentaires
                                    </h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#heroesArticle" role="button" data-slide="prev">
            <img src="{{ asset('img/circled-arrow-white.svg') }}" width="70px" style="transform: rotate(180deg);">
        </a>
        <a class="carousel-control-next" href="#heroesArticle" role="button" data-slide="next">
            <img src="{{ asset('img/circled-arrow-white.svg') }}" width="70px">
        </a>
    </div>
</header>

<!-- Main Content -->
<div class="container-fluid">
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
                        <a class="font-italic" href="{{ route('pages.category', $article->category['id']) }}">
                            {{ $article->category->name }}
                        </a>
                        |
                        @if ($article->anonymous)
                            <b>  
                                Anonyme
                            </b>
                        @else
                            <a class="font-weight-bold @if ($article->user->hasAnyRole('admin|president|member')) text-success @endif" href="{{ route('pages.user', $article->user->username) }}"> 
                                {{ $article->user->username }}
                            </a>
                        @endif
                        |
                        {{ date('d/m/Y', strtotime($article->created_at)) }}
                        |
                        {{ $article->comments()->count() }} commentaires
                    </small>
                </div>
                <hr>
            @endforeach

            <a href="#" class="btn-load-more" style="width: 70px;">
                <img src="{{ asset('img/circled-arrow-gray.svg') }}" width="70px">
            </a>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script src="{{ asset('js/jquery.bcSwipe.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

@endsection