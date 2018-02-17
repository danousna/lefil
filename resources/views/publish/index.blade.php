@extends('main')

@section('title', 'Publication')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-xl-6 col-lg-8 col-10 mx-auto">
            <div class="div-bubble p-4 my-4">
                <h4>Articles en attente de publication : </h4>

                <div class="table-responsive">
                <table class="table">
                    <tbody>
                    @foreach ($categories as $category)
                        @foreach ($category->articles->where('status', 'waiting') as $article)
                            <?php $date = explode('-', substr($article->created_at, 0, 10)); ?>
                            <tr>
                                <td class="px-0" style="border: none !important;">
                                    <a class="mr-2" href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                                </td>
                                <td class="px-0" style="border: none !important;">
                                    <small class="text-muted">
                                        {{ $article->user->username }}
                                        |
                                        <a href="{{ route('pages.category', $category->id) }}">{{ $category->name }}</a>
                                        |
                                        {{ date('d/m/Y', strtotime($article->created_at)) }}
                                    </small>
                                </td>
                                <td class="px-0 text-right" style="border: none !important;">
                                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-secondary btn-sm">Voir</a>
                                    <a href="{{ route('publish.article', $article->id) }}" class="btn btn-success btn-sm">Publier</a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection