@extends('main')

@section('title', 'Modifier Une Rubrique')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-11 mx-auto my-4 p-4">
            <form method="POST" action="{{ route('categories.update', $category->id) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="category">Nom de la catégorie</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
                </div>

                <div class="form-group">
                    <label for="users[]">Associer un ou plusieurs utilisateurs</label>

                    <br>

                    <?php $count = 0 ?>

                    @foreach ($users as $user)
                        <?php $count++ ?>
                        <input type="checkbox" name="users[]" id="{{ $user->id }}" value="{{ $user->id }}" @if ($user->hasAnyRole('admin|president') || in_array($user->id, $category->users->pluck('id')->toArray())) {{"checked"}} @endif> 
                        <label for="{{$user->id}}">{{ $user->name }}</label>
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