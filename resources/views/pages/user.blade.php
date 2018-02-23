@extends('main')

@section('title', $user->username)

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            <h2>{{ $user->username }}</h2>
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-11 mx-auto my-4 p-4">
            <h4 class="mb-4">Informations</h4>

            <dl>
                <dt>Articles</dt>
                <dd>{{ $user->articles()->where('status', 'published')->where('anonymous', 0)->count() }}</dd>
                <dt>Inscription</dt>
                <dd>{{ date('m/Y', strtotime($user->created_at)) }}</dd>
            </dl>

            <hr>

            <h4 class="my-4">Rubriques</h4>

            @foreach ($user->categories as $category)
                <a href="{{ route('pages.category', $category->id) }}" class="btn btn-secondary btn-sm mb-2 mr-1">{{ $category->name }}</a>
            @endforeach
        </div>
    </div>
</div>

@endsection