@extends('main')

@section('title', 'Réinitialiser le mot de passe')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-12 mx-auto p-4 text-center">
            <h2>Réinitialiser le mot de passe</h2>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="col-md-6 col-12 mx-auto my-4 p-4 div-bubble">
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                </div>

                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>

@endsection