@extends('main')

@section('title', 'Modifier Un Utilisateur')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <h3 class="mb-4">Modifier l'utilisateur : {{ $user->name }}</h3>

            <form method="POST" action="{{ route('users.update', $user->id) }}">
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
                
                <br>

                <input type="submit" value="Modifier" class="btn btn-primary">

                {{ method_field('PUT') }}
            </form>
        </div>
    </div>
</div>

@endsection