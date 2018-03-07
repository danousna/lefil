@extends('main')

@section('title', 'Commentaires')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <h4>Gestion des commentaires <small class="text-muted">(affichage des 50 derniers commentaires)</small></h4>

            <br>

            @foreach ($comments as $comment)
                <?php $date = explode('-', substr($comment->article->created_at, 0, 10)); ?>
                <dl class="row" id="{{ $comment->id }}">
                    <dt class="col-sm-4">Article :</dt>
                    <dd class="col-sm-8"><a href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $comment->article->slug }}">{{ $comment->article->title }}</a></dd>
                    <dt class="col-sm-4">ID :</dt>
                    <dd class="col-sm-8"><b>{{ $comment->id }}</b></dd>
                    <dt class="col-sm-4">Commentaire :</dt> 
                    <dd class="col-sm-8">{{ $comment->body }}</dd>
                    <dt class="col-sm-4">Utilisateur :</dt> 
                    <dd class="col-sm-8">{{ $comment->user->username }}</dd>
                    @if ($comment->reply_comment_id)
                        <dt class="col-sm-4">Réponse au commentaire :</dt> 
                        <dd class="col-sm-8"><b><a href="#{{ $comment->reply_comment_id }}">{{ $comment->reply_comment_id }}</a></b></dd>
                    @endif
                </dl>
                <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" style="display: inline-block;">
                    {{ csrf_field() }}

                    <input type="submit" value="Supprimer" class="btn btn-danger btn-sm"> 
                    <small>Affichera : "Ce commentaire a été supprimé"</small>
                    {{ method_field('DELETE') }}
                </form>
                <hr>
            @endforeach
        </div>
    </div>
</div>

@endsection