@extends('main')

@section('title', 'Modifier Mes Informations')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-6 col-12 mx-auto my-4 p-4 div-bubble">
            <form method="POST" action="{{ route('account.update', $user->id) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                </div>

                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input id="password" type="password" class="form-control" name="password">
                    <small id="passwordIndication" class="form-text text-muted">Laissez vide si vous ne souhaitez pas changer de mot de passe.</small>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Veuillez confirmer le mot de passe</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                </div>

                <br>

                <input type="submit" value="Modifier" class="btn btn-primary">

                {{ method_field('PUT') }}
            </form>    
        </div>
    </div>
</div>

@endsection