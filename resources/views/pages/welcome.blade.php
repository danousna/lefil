@extends('main')

@section('title', 'Accueil')

@section('content')

<!-- Page Header -->
@if ($articles->count() > 0)
    <div class="bg-bubble">
        <header class="masthead">
            <?php $premier = $heroes->where('type', 'premier')->first()->article; ?>
            <?php $second = $heroes->where('type', 'second')->first()->article; ?>
            <?php $dernier = $heroes->where('type', 'dernier')->first()->article; ?>

            <div class="bg-blurry" @if ($premier->image != "") style="background-image: url('{{ asset('storage/blur-'.$premier->image) }}');" @endif></div>
            <div class="container">
                <div class="row py-4">
                    <div class="col-md-8 col-12 mx-auto">
                        <?php $date = explode('-', substr($premier->created_at, 0, 10)); ?>
                        <a class="d-block div-bubble hero hero-lg mb-3 mt-0 px-0" href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $premier->slug }}" @if ($premier->image != "") style="background-image: url('{{ asset('storage/'.$premier->image) }}'); background-size: cover; background-position: 50% 50px; background-repeat: no-repeat;" @endif>
                            <div class="bg-white p-4 borders-top">
                                <h2 class="title">
                                    {{ $premier->title }}
                                </h2>
                                <h4 class="font-weight-normal">
                                    @if ($premier->issue_id)
                                        <b>{{ $premier->issue->number }}</b>
                                        |
                                    @endif
                                    {{ $premier->category->name }}
                                    |
                                    @if ($premier->anonymous)
                                        <span>  
                                            Anonyme
                                        </span>
                                    @else    
                                        <span class="@if ($premier->user->hasAnyRole('admin|president|member')) text-success @endif">  
                                            {{ $premier->user->username }}
                                        </span>
                                    @endif
                                    |
                                    {{ date('d/m/Y', strtotime($premier->created_at)) }}
                                </h4>
                            </div>
                        </a>
                    </div>
            
                    <div class="col-md-4 col-12 mx-auto">
                        <?php $date = explode('-', substr($second->created_at, 0, 10)); ?>
                        <a class="d-block div-bubble hero mb-3 px-0" href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $second->slug }}">
                            <div class="bg-white p-3 borders-full">
                                <h4 class="title">{{ $second->title }}</h4>
                                <small>
                                    @if ($second->issue_id)
                                        <b>{{ $second->issue->number }}</b>
                                        |
                                    @endif
                                    {{ $second->category->name }}
                                    |
                                    @if ($second->anonymous)
                                        <span>  
                                            Anonyme
                                        </span>
                                    @else    
                                        <span class="@if ($second->user->hasAnyRole('admin|president|member')) text-success @endif">  
                                            {{ $second->user->username }}
                                        </span>
                                    @endif
                                    |
                                    {{ date('d/m/Y', strtotime($second->created_at)) }}
                                </small>
                            </div>
                        </a>

                        <?php $date = explode('-', substr($dernier->created_at, 0, 10)); ?>
                        <a class="d-block div-bubble hero mb-3 px-0" href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $dernier->slug }}">
                            <div class="bg-white p-3 borders-full">
                                <h4 class="title">{{ $dernier->title }}</h4>
                                <small>
                                    @if ($dernier->issue_id)
                                        <b>{{ $dernier->issue->number }}</b>
                                        |
                                    @endif
                                    {{ $dernier->category->name }}
                                    |
                                    @if ($dernier->anonymous)
                                        <span>  
                                            Anonyme
                                        </span>
                                    @else    
                                        <span class="@if ($dernier->user->hasAnyRole('admin|president|member')) text-success @endif">  
                                            {{ $dernier->user->username }}
                                        </span>
                                    @endif
                                    |
                                    {{ date('d/m/Y', strtotime($dernier->created_at)) }}
                                </small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class="container">
            <div class="row py-4 bg-bubble">
                <div class="col-md-8 col-12 mx-auto">
                    <div class="div-bubble my-4 p-4">                
                        @if ($articles->count() > 3) 
                            @foreach ($articles as $article)
                                <?php $date = explode('-', substr($article->created_at, 0, 10)); ?>

                                <div class="article">
                                    <h5 class="mb-0">
                                        <a class="title" href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $article->slug }}">
                                            {{ $article->title }}
                                        </a>
                                    </h5>
                                    <small class="text-muted mb-0 mt-1">
                                        @if ($article->issue_id)
                                            <b><a href="{{ route('pages.issue', $article->issue->number) }}">{{ $article->issue->number }}</a></b>
                                            |
                                        @endif
                                        <a href="{{ route('pages.category', $article->category['id']) }}">
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

                <div class="col-md-4 col-12 mx-auto">

                    <div class="div-bubble my-4 p-4">
                        <h4 class="mb-3 title"><a href="/bops">Bop's</a></h4>
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
                        <h4 class="title">Commentaires récents</h4>
                        @foreach ($comments as $comment)
                            <?php $date = explode('-', substr($comment->article->created_at, 0, 10)); ?>
                            <div class="mt-3">
                                <div style="font-size: 16px;">
                                    <a href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $comment->article->slug . '#' . $comment->id }}">{{ $comment->body }}</a>
                                </div>
                                <small class="text-muted" style="font-size: 14px;">
                                    <a href="{{ route('pages.user', $comment->user->username) }}">{{ $comment->user->username }}</a>
                                    le {{ date('d/m/y à H:m', strtotime($comment->created_at)) }}
                                </small>
                            </div>
                        @endforeach
                    </div>
                    <div class="div-bubble my-4 p-4">
                        <h4 class="mb-3 title">Numéros</h4>
                        @foreach ($issues as $issue)
                            <?php $date = explode('-', explode(' ', $issue->release_date)[0]); ?>
                            <div>
                                <a href="{{ route('pages.issue', $issue->number)}}"><b>n°{{ $issue->number }}</b> {{($issue->titre != "") ? "- ".$issue->titre : "" }}
                                </a>
                                <br>
                                <small class="text-muted">
                                    {{ $date[2].'/'.$date[1].'/'.$date[0] }} 
                                    | 
                                    {{ $issue->articles->where('status', 'published')->count() }} article(s)
                                </small>
                            </div>
                        @endforeach
                    </div>
                    <div class="div-bubble my-4 p-4">
                        <h4 class="mb-3 title">Rubriques</h4>
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
    <div class="bg-bubble">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
                     <p class="text-center">Pas d'articles pour le moment.</p>
                 </div>
             </div>
         </div>
     </div>
@endif

@endsection