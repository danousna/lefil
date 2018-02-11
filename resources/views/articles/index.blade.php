@extends('main')

@section('title', 'Mes Articles')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            Tous mes articles
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-11 mx-auto my-4 p-4">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="font-size: 1rem">
                    <thead>
                        <th>Article (lien publique)</th>
                        <th>Corps</th>
                        <th>Rubrique</th>
                        <th>Action</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        
                        @foreach ($articles as $article)
                            <?php $date = explode('-', substr($article->created_at, 0, 10)); ?>
                            <tr>
                                <td>
                                    <a href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $article->slug }}">{{ $article->title }}</a>
                                </td>
                                <td>{{ substr($article->body, 0, 60) }}{{ strlen($article->body) > 60 ? "..." : "" }}</td>
                                <td>{{ $article->category['name'] }}</td>
                                <td>
                                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary btn-sm mb-1 mr-1">Voir</a>
                                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-secondary btn-sm mb-1">Modifier</a>
                                    @if ($article->status == 'draft')
                                        <a href="{{ route('articles.publish', $article->id) }}" class="btn btn-success btn-sm mb-1">Publier</a>
                                    @endif
                                </td>
                                <td>
                                    @if ($article->status == 'draft')
                                        Brouillon
                                    @endif
                                    @if ($article->status == 'published')
                                        Publié
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection