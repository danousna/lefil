@extends('main')

@section('title', 'Inscription')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            Inscription
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-11 mx-auto my-4 p-4">            
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ (old('name') == '') ? $name : old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input id="username" type="text" class="form-control" name="username" value="{{ (old('username') == '') ? $username : old('username') }}" required>
                    <small id="usernameHelp" class="form-text text-muted">Votre nom d'utilisateur sera votre nom d'auteur, il sera visible par tous.</small>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirmez le mot de passe</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <br>

                <button type="submit" class="btn btn-primary">Inscription</button>
            </form>
        </div>
    </div>
</div>

@endsection
