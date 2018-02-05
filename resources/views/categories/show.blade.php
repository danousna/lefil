@extends('main')

@section('title', "Rubrique : $category->name")

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            Modifier <b>{{ $category->name }}</b>
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-11 mx-auto my-4 p-4">
            
            <h4 class="mb-4">Auteurs</h4>
            @foreach ($category->users as $user)
                <a href="{{ route('pages.user', $user->username) }}">{{ $user->username }}</a>,
            @endforeach

            <hr>

            <h4 class="my-4">Articles</h4>

            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="font-size: 1rem">
                    <thead>
                        <th>Article</th>
                        <th>Auteur</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        
                        @foreach ($category->articles as $article)
                            <?php $date = explode('-', substr($article->created_at, 0, 10)); ?>
                            <tr>
                                <td><a href="{{ url('/') .'/'. $date[0] .'/'. $date[1] .'/'. $date[2] .'/'. $article->slug }}">{{ substr($article->title, 0, 40) }}{{ strlen($article->title) > 40 ? "..." : "" }}</a></td>
                                <td>{{ $article->user['username'] }}</td>
                                <td>
                                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-secondary btn-sm mb-1 mr-1">Voir</a>
                                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-secondary btn-sm mb-1">Modifier</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <br>

            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Modifier la rubrique</a>

        </div>
    </div>
</div>

@endsection