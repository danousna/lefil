@extends('main')

@section('title', 'Modifier Un Utilisateur')

@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <h3 class="my-5">Modifier l'utilisateur : {{ $user->name }}</h3>

                <form method="POST" action="{{ route('users.update', $user->id) }}" class="pb-5">
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

                    <div class='form-group'>
                        <label for="roles[]">Assigner un rôle à l'utilisateur</label>

                        <br>

                        <?php $count = 0 ?>

                        @foreach ($roles as $role)
                            <?php $count++ ?>
                            <input type="checkbox" name="roles[]" id="{{ $role->id }}" value="{{ $role->id }}" @if ($user->hasRole($role->name)) {{"checked"}} @endif> 
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

                    <div class="form-group">
                        <input type="submit" value="Modifier" class="btn btn-primary">
                    </div>

                    {{ method_field('PUT') }}
                </form>
            </div>
        </div>
    </div>

@endsection