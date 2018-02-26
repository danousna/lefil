@extends('main')

@section('title', "Numéro $issue->number")

@section('content')

<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-11 mx-auto my-4 p-4">
            
            <h3 class="mb-4">Numéro {{ $issue->number }} {{ ($issue->titre) ? ": ".$issue->titre : "" }}</h3>
            
            @if ($issue->status == "published")
                <span class="text-success">Publié</span>
            @endif

            <hr>

            <h4 class="my-4">Version pdf</h4>
            <div class="text-center">
                @if ($issue->pdf != '')
                    <a class="pdf-link" href="{{ asset('storage/'.$issue->pdf) }}"><img src="{{ asset('storage/'.$issue->image) }}"></a>
                @else
                    Pas de version pdf disponible.
                @endif
            </div>

            <h4 class="my-4">Articles</h4>

            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="font-size: 1rem">
                    <thead>
                        <th>Article</th>
                        <th>Auteur</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        
                        @foreach ($issue->articles as $article)
                            <?php $date = explode('-', substr($article->created_at, 0, 10)); ?>
                            <tr>
                                <td><a href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $article->slug }}">{{ substr($article->title, 0, 40) }}{{ strlen($article->title) > 40 ? "..." : "" }}</a></td>
                                <td>
                                    @if ($article->anonymous)  
                                        Anonyme
                                    @else
                                        {{ $article->user->username }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-secondary btn-sm mb-1 mr-1">Voir</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <br>
            
            @if ($issue->status == "draft")
                <a href="{{ route('issues.publish', $issue->id) }}" class="btn btn-success">Publier le numéro</a>
            @endif

            <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-primary">Modifier le numéro</a>

        </div>
    </div>
</div>

@endsection