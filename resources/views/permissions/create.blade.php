@extends('main')

@section('title', 'Créer Une Permission')

@section('content')
    
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <h3 class="my-5">Ajouter une permission</h3>

                <form method="POST" action="{{ route('permissions.create') }}" class="pb-5">
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

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection