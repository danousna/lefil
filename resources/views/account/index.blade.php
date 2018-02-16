@extends('main')

@section('title', 'Mon Compte')

@section('content')
    
<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-11 mx-auto my-4 p-4">

            <a href="{{ route('pages.user', $user->username) }}" class="btn btn-secondary btn-sm">Page publique</a>

            <hr>

            <h4 class="my-4">Informations personnelles</h4>

            <dl>
                <dt>Nom d'utilisateur</dt>
                <dd>{{ $user->username }}</dd>
                <dt>Nom</dt>
                <dd>{{ $user->name }}</dd>
                <dt>Email</dt>
                <dd>{{ $user->email }}</dd>
            </dl>

            <a href="{{ route('account.edit', $user->id) }}" class="btn btn-secondary btn-sm">Modifier</a>
            
            <hr>

            <h4 class="my-4">Mes rubriques</h4>

            @foreach ($user->categories as $category)
                <a href="{{ route('pages.category', $category->id) }}" class="btn btn-secondary btn-sm mb-2 mr-1">{{ $category->name }}</a>
            @endforeach

        </div>
    </div>
</div>

@endsection