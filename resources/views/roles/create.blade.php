@extends('main')

@section('title', 'Créer Un Rôle')

@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <h3 class="my-5">Ajouter un rôle</h3>

                <form method="POST" action="{{ route('roles.create') }}" class="pb-5">
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

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection