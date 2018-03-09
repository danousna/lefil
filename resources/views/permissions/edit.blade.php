@extends('main')

@section('title', 'Modifier Une Permission')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">

            <h3 class="mb-4">Modifier la permission : {{$permission->name}}</h3>

            <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $permission->name }}" required>
                </div>
                
                <br>

                <input type="submit" value="Modifier" class="btn btn-primary">

                {{ method_field('PUT') }}
            </form>
        </div>
    </div>
</div>

@endsection