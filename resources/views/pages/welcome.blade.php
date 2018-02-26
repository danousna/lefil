@extends('main')

@section('title', 'Accueil')

@section('content')

<!-- Page Header -->
@if ($articles->count() > 0)
    <header class="masthead" style="display: none;">
        <div id="heroesArticle" class="carousel slide" data-ride="carousel" data-interval='false'>
            <ol class="carousel-indicators">
                <?php $count = 0 ?>
                @foreach ($articles->slice(0, 3) as $article)
                    <li data-target="#heroesArticle" data-slide-to="{{ $count }}" class="{{( $count == 0) ? "active" : "" }}"></li>
                    <?php $count++ ?>
                @endforeach
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
                                            @if ($article->issue_id)
                                                <b>{{ $article->issue->number }}</b>
                                                |
                                            @endif
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

    <div class="bg-bubble">
        <header class="masthead">
            <div class="bg-blurry" @if ($articles->first()->image != "") style="background-image: url('{{ asset('storage/blur-'.$articles->first()->image) }}');" @endif></div>
            <div class="container">
                <div class="row py-4">
                    <div class="col-md-8 col-11 mx-auto">
                        <?php $date = explode('-', substr($articles->first()->created_at, 0, 10)); ?>
                        <a class="d-block div-bubble hero hero-lg mb-3 mt-0 px-0" href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $articles->first()->slug }}" @if ($articles->first()->image != "") style="background-image: url('{{ asset('storage/'.$articles->first()->image) }}');" @endif>
                            <div class="bg-white p-4 borders-top">
                                <h2>
                                    {{ $articles->first()->title }}
                                </h2>
                                <h4 class="font-weight-normal">
                                    @if ($articles->first()->issue_id)
                                        <b>{{ $articles->first()->issue->number }}</b>
                                        |
                                    @endif
                                    <i>{{ $articles->first()->category->name }}</i>
                                    |
                                    @if ($articles->first()->anonymous)
                                        <span>  
                                            Anonyme
                                        </span>
                                    @else    
                                        <span class="@if ($articles->first()->user->hasAnyRole('admin|president|member')) text-success @endif">  
                                            {{ $articles->first()->user->username }}
                                        </span>
                                    @endif
                                    |
                                    {{ date('d/m/Y', strtotime($articles->first()->created_at)) }}
                                </h4>
                            </div>
                        </a>
                    </div>
            
                    <div class="col-md-4 col-11 mx-auto">
                        @foreach ($articles->slice(1, 2) as $article)
                            <?php $date = explode('-', substr($article->created_at, 0, 10)); ?>
                            <a class="d-block div-bubble hero mb-3 px-0" href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $article->slug }}">
                                <div class="bg-white p-4 borders-full">
                                    <h4>{{ $article->title }}</h4>
                                    <small>
                                        @if ($article->issue_id)
                                            <b>{{ $article->issue->number }}</b>
                                            |
                                        @endif
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
                                    </small>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </header>

        <div class="container">
            <div class="row py-4 bg-bubble">
                <div class="col-md-8 col-11 mx-auto">
                    <div class="div-bubble my-4 p-4">
                        <h2 class="mb-3">Articles :</h2>                   
                        @if ($articles->count() > 3) 
                            @foreach ($articles->slice(3, $articles->count()) as $article)
                                <?php $date = explode('-', substr($article->created_at, 0, 10)); ?>

                                <div class="article">
                                    <h5 class="mb-0">
                                        <a href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $article->slug }}">
                                            {{ $article->title }}
                                        </a>
                                    </h5>
                                    <small class="text-muted mb-0 mt-1">
                                        @if ($article->issue_id)
                                            <b><a href="{{ route('pages.issue', $article->issue->number) }}">{{ $article->issue->number }}</a></b>
                                            |
                                        @endif
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

                                        @if ($article->comments()->count() > 0)
                                            |
                                            {{ $article->comments()->count() }} commentaires
                                        @endif
                                    </small>
                                </div>
                                <hr>
                            @endforeach
                        @else
                            <span class="d-block text-center">Pas d'autres articles.</>
                        @endif
                    </div>
                </div>

                <div class="col-md-4 col-11 mx-auto">

                    <div class="div-bubble my-4 p-4">
                        <h2 class="mb-3"><a href="/bops">Bop's :</a></h2>
                        @foreach ($bops as $bop)
                            <div class="media" style="font-size: 16px">
                                <span class="d-flex mr-2"><b>{{ $bop->uv }} :</b></span>
                                <div class="media-body">
                                    {{ $bop->body }}<br>
                                    <small class="text-muted">
                                    </small>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>

                    <div class="div-bubble my-4 p-4">
                        <h2 class="mb-3">Commentaires récents :</h2>
                        @foreach ($comments as $comment)
                            <div style="font-size: 16px">
                                <b>
                                    <a href="{{ route('pages.user', $comment->user->username) }}">
                                        {{ $comment->user->username }}
                                    </a>
                                </b> 
                                le {{ date('d/m/y à H:m', strtotime($comment->created_at)) }} 
                                <div>
                                    {{ $comment->body }} @if ($comment->reply_comment_id) <i class="fas fa-reply"></i>@endif 
                                    <br>
                                </div>
                                <?php $date = explode('-', substr($comment->article->created_at, 0, 10)); ?>
                                <small class="font-weight-bold"><a href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $comment->article->slug }}">{{ substr($comment->article->title, 0, 47) }} {{ (strlen($comment->article->title) > 47) ? "..." : "" }}</a></small>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                    <div class="div-bubble my-4 p-4">
                        <h2 class="mb-3">Numéros :</h2>
                        @foreach ($issues as $issue)
                            <?php $date = explode('-', explode(' ', $issue->release_date)[0]); ?>
                            <div class="media">
                                <span class="d-flex mr-2"><b><a href="{{ route('pages.issue', $issue->number) }}">{{ $issue->number }} :</a></b></span>
                                <div class="media-body">
                                    <a href="{{ route('pages.issue', $issue->number) }}">{{ $issue->titre }}</a><br>
                                    <small class="text-muted">
                                        {{ $date[2].'/'.$date[1].'/'.$date[0] }} 
                                        | 
                                        {{ $issue->articles->where('status', 'published')->count() }} article(s)
                                    </small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="div-bubble my-4 p-4">
                        <h2 class="mb-3">Rubriques :</h2>
                        @foreach ($categories as $category)
                            <a href="{{ route('pages.category', $category->id) }}"><i>{{ $category->name }}</i></a><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row py-4 pb-5 bg-bubble">
            <div class="div-bubble col-xl-6 col-lg-8 col-10 mx-auto my-4 p-4">
                 <span class="d-block text-center">Pas d'articles, ce n'est pas normal.</span>
             </div>
         </div>
     </div>
@endif

@endsection

@section('scripts')

    <script src="{{ asset('js/jquery.bcSwipe.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

@endsection