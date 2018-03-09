@extends('main')

@section('title', 'Commentaires')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <h3 class="mb-4">Gestion des commentaires</h3>

            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs" id="tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="new-tab" data-toggle="tab" href="#new" role="tab">Tous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="deleted-tab" data-toggle="tab" href="#deleted" role="tab">Supprimés</a>
                        </li>
                    </ul>
                </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane show active" id="new" role="tabpanel" aria-labelledby="new-tab">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Les derniers commentaires :</h5>

                                @foreach ($comments->where("status", "published") as $comment)
                                    <?php $date = explode('-', substr($comment->article->created_at, 0, 10)); ?>
                                    <dl class="row" id="{{ $comment->id }}">
                                        <dt class="col-sm-4">Commentaire :</dt> 
                                        <dd class="col-sm-8">{{ $comment->body }}</dd>
                                        <dt class="col-sm-4">Utilisateur :</dt> 
                                        <dd class="col-sm-8">{{ $comment->user->username }}</dd>
                                        <dt class="col-sm-4">Article :</dt>
                                        <dd class="col-sm-8"><a href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $comment->article->slug }}">{{ $comment->article->title }}</a></dd>
                                        <dt class="col-sm-4">ID :</dt>
                                        <dd class="col-sm-8"><b>{{ $comment->id }}</b></dd>
                                        @if ($comment->reply_comment_id)
                                            <dt class="col-sm-4">Réponse au commentaire :</dt> 
                                            <dd class="col-sm-8"><b><a href="#{{ $comment->reply_comment_id }}">{{ $comment->reply_comment_id }}</a></b></dd>
                                        @endif
                                    </dl>
                                    <form method="POST" action="{{ route('comments.destroy', $comment->id) }}" style="display: inline-block;">
                                        {{ csrf_field() }}

                                        <input type="submit" value="Supprimer" class="btn btn-danger btn-sm"> 
                                        <small class="ml-2 text-muted">Affichera : "Ce commentaire a été supprimé"</small>
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <hr>
                                @endforeach
                            </div>
                            <div class="card-footer text-muted">
                                {{ $comments->where("status", "published")->count() }} commentaires
                            </div>
                        </div>
                        <div class="tab-pane" id="deleted" role="tabpanel" aria-labelledby="deleted-tab">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Les commentaires supprimés :</h5>

                                @foreach ($comments->where("status", "deleted") as $comment)
                                    <?php $date = explode('-', substr($comment->article->created_at, 0, 10)); ?>
                                    <dl class="row" id="{{ $comment->id }}">
                                        <dt class="col-sm-4">Commentaire :</dt> 
                                        <dd class="col-sm-8">{{ $comment->body }}</dd>
                                        <dt class="col-sm-4">Utilisateur :</dt> 
                                        <dd class="col-sm-8">{{ $comment->user->username }}</dd>
                                        <dt class="col-sm-4">Article :</dt>
                                        <dd class="col-sm-8"><a href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $comment->article->slug }}">{{ $comment->article->title }}</a></dd>
                                        <dt class="col-sm-4">ID :</dt>
                                        <dd class="col-sm-8"><b>{{ $comment->id }}</b></dd>
                                        @if ($comment->reply_comment_id)
                                            <dt class="col-sm-4">Réponse au commentaire :</dt> 
                                            <dd class="col-sm-8"><b><a href="#{{ $comment->reply_comment_id }}">{{ $comment->reply_comment_id }}</a></b></dd>
                                        @endif
                                    </dl>
                                    <form method="POST" action="{{ route('comments.update', $comment->id) }}" style="display: inline-block;">
                                        {{ csrf_field() }}
                                        <input type="submit" value="Annuler la suppression" class="btn btn-primary btn-sm"> 
                                        {{ method_field('PUT') }}
                                    </form>
                                    <hr>
                                @endforeach
                            </div>
                            <div class="card-footer text-muted">
                                {{ $comments->where("status", "deleted")->count() }} commentaires
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script>
        $('#tab a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
        });
    </script>

@endsection