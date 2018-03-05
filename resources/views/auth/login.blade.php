@extends('main')

@section('title', 'Connexion')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-12 mx-auto p-4 text-center">
            <h2>Connexion</h2>
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="col-md-6 col-12 mx-auto my-4 p-4 div-bubble">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <div class="form-group">
                    <div class="checkbox">
                        <input type="checkbox" name="remember" checked> 
                        <label class="small" for="checkbox">Se souvenir de moi</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Connexion</button>
                &nbsp;
                <a class="btn btn-link text-secondary pl-0" href="{{ route('password.request') }}"> Mot de passe oublié ?</a>
            </form>
        </div>
    </div>
</div>

@endsection
