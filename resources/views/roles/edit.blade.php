@extends('main')

@section('title', 'Modifier Un Rôle')

@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <h3 class="my-5">Modifier le rôle : {{$role->name}}</h3>

                <form method="POST" action="{{ route('roles.update', $role->id) }}" class="pb-5">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="permissions[]">Assigner des permissions au rôle</label>

                        <br>

                        <?php $count = 0 ?>
                    
                        @foreach ($permissions as $permission)
                            <?php $count++ ?>
                            <input type="checkbox" name="permissions[]" id="{{ $permission->id }}" value="{{ $permission->id }}" @if ($role->hasPermissionTo($permission->name)) {{"checked"}} @endif> 
                            <label for="{{$permission->id}}">{{ ucfirst($permission->name) }}</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            @if ($count == 3)
                                <br>
                            @endif
                        @endforeach
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