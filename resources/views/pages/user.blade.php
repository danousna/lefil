@extends('main')

@section('title', $user->username)

@section('content')

<!-- Page Header -->
<header class="masthead bg-default" style="height: 250px">
    <div class="container">
        <div class="row">
            <div class="post col-xl-6 col-lg-8 col-11 my-4 p-4">
                <div class="post-heading text-center">
                    <h1 style="font-size: 3rem;">{{ $user->username }}</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-11 mx-auto my-4 p-4">
            <h4 class="mb-4">Informations</h4>

            <dl>
                <dt>Articles</dt>
                <dd>{{ $user->articles()->count() }}</dd>
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