@extends('main')

@section('title', 'Créer Un Utilisateur')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <h3 class="mb-4">Ajouter un utilisateur</h3>

            <form method="POST" action="{{ route('users.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input id="name" type="text" class="form-control" name="name" required>
                </div>

                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input id="username" type="text" class="form-control" name="username" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email" required>
                </div>

                <div class="form-group">
                    <label for="roles[]">Assigner un rôle</label>

                    <br>

                    <?php $count = 0 ?>

                    @foreach ($roles as $role)
                        <?php $count++ ?>
                        <input type="checkbox" name="roles[]" id="{{ $role->id }}" value="{{ $role->id }}"> 
                        <label for="{{$role->id}}">{{ ucfirst($role->name) }}</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        @if ($count == 3)
                            <br>
                        @endif
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Veuillez confirmer le mot de passe</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <br>

                <button type="submit" class="btn btn-primary">Publier</button>
            </form>
        </div>
    </div>
</div>

@endsection