@extends('main')

@section('title', 'Créer Un Rôle')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <h3 class="mb-4">Ajouter un rôle</h3>

            <form method="POST" action="{{ route('roles.create') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="roles[]">Assigner des permissions au rôle</label>

                    <br>

                    <?php $count = 0 ?>

                    @foreach ($permissions as $permission)
                        <?php $count++ ?>
                        <input type="checkbox" name="permissions[]" id="{{ $permission->id }}" value="{{ $permission->id }}"> 
                        <label for="{{$permission->id}}">{{ ucfirst($permission->name) }}</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        @if ($count == 3)
                            <br>
                        @endif
                    @endforeach
                </div>

                <br>

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>

@endsection