@extends('main')

@section('title', 'Créer Un Utilisateur')

@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <h3 class="my-5">Ajouter un utilisateur</h3>

                <form method="POST" action="{{ route('users.store') }}" class="pb-5">
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
                        <input id="password" type="text" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Veuillez confirmer le mot de passe</label>
                        <input id="password_confirmation" type="text" class="form-control" name="password_confirmation" required>
                    </div>

                    <br>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Publier</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection