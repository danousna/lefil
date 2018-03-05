@extends('main')

@section('title', 'Créer Une Rubrique')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <form method="POST" action="{{ route('categories.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="category">Nom de la catégorie</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="users[]">Associer un ou plusieurs utilisateurs</label>

                    <br>

                    <?php $count = 0 ?>

                    @foreach ($users as $user)
                        <?php $count++ ?>
                        <input type="checkbox" name="users[]" id="{{ $user->id }}" value="{{ $user->id }}" @if ($user->hasAnyRole('admin|president')) {{"checked"}} @endif> 
                        <label for="{{$user->id}}">{{ $user->name }}</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        @if ($count == 3)
                            <br>
                        @endif
                    @endforeach
                </div>

                <br>

                <input type="submit" value="Créer" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

@endsection