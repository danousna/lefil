@extends('main')

@section('title', "$article->title")

@section('content')

<!-- Page Header -->
<header class="masthead">
    <div class="bg-blurry" @if ($article->image != "") style="background-image: url('{{ asset('storage/'.$article->image) }}'); opacity: 0.6" @endif></div>
    <div class="container">
        <div class="row">
            <div class="post col-lg-8 col-11 my-4 p-4">
                <div class="post-heading text-center">
                    <h1 style="font-size: 3rem;">{{ $article->title }}</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">

    <!-- Post Content -->
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
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
            |
            <a href="#comments">{{ $count }} commentaires</a>
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-11 mx-auto my-4 p-4 article">
            {!! $article->body !!}
        </div>
    </div>

    <!-- Comments -->
    <div class="row bg-bubble pb-4">
        <div id="comments" class="div-bubble col-xl-6 col-lg-8 col-11 mx-auto my-4 p-4">
            <h4>{{ $count }} commentaires :</h4>

            @if ($comments)    
                @each('partials._comment', $comments, 'comment', '')
            @endif

            @if (Auth::check())
                <form method="POST" action="{{ route('comments.store', [$article->id, 'NULL']) }}">
                    {{ csrf_field() }}
                    <div class="form-group floating-label-form-group controls">
                        <label class="font-weight-bold">Commenter</label>
                        <textarea rows="3" class="form-control" name="body" id="body" required></textarea>
                    </div>                
                    <input type="submit" class="btn btn-secondary" value="Envoyer">
                </form>
            @else
                <div class="text-center"> 
                    <small><a href="{{ route('login') }}">Connectez vous</a> pour commenter</small>
                </div>
            @endif
        </div>
    </div>
</div>    

@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        $(".comment-reply").on('click', function(event) {
            event.preventDefault();
            
            $(this).closest(".comment").next().toggle();
        });
    });
</script>    

@endsection