@extends('main')

@section('title', 'Créer Une Permission')

@section('content')
    
<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble"> 
            <h3 class="mb-4">Ajouter une permission</h3>

            <form method="POST" action="{{ route('permissions.create') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                @if(!$roles->isEmpty())
                <div class="form-group">
                    <label for="roles[]">Assigner la permission aux rôles</label>

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
                @endif

                <br>

                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>

@endsection