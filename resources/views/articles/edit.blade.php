@extends('main')

@section('title', 'Modifier Un Article')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            Modifier <b>{{ $article->title }}</b>
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-11 mx-auto my-4 p-4">
            <form method="POST" action="{{ route('articles.update', $article->id) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Titre</label>
                    <input id="title" type="text" class="form-control" name="title" value="{{ $article->title }}" required>
                </div>

                <div class="form-group">
                    <label for="category">Rubrique</label>
                    <select class="form-control" name="category_id">

                        @foreach ($user->categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label for="body">Corps</label>
                    <textarea id="body" rows="10" class="form-control" name="body" required>{{ $article->body }}</textarea>
                </div>

                <div class="form-group">
                    <label for="slug">Lien</label>
                    <input id="slug" type="text" class="form-control" name="slug" value="{{ $article->slug }}" required>
                </div>

                <br>

                <a href="{{ route('articles.index') }}" class="btn btn-danger">Annuler</a>
                <button type="submit" class="btn btn-primary">Sauvegarder</button>

                {{ method_field('PUT') }}
            </form>
        </div>
    </div>
</div>

@endsection
