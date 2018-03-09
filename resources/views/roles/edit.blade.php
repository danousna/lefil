@extends('main')

@section('title', 'Modifier Un Rôle')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <h3 class="mb-4">Modifier le rôle : {{$role->name}}</h3>

            <form method="POST" action="{{ route('roles.update', $role->id) }}">
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

                <input type="submit" value="Modifier" class="btn btn-primary">

                {{ method_field('PUT') }}
            </form>
        </div>
    </div>
</div>

@endsection