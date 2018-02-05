@extends('main')

@section('title', 'Modifier Une Permission')

@section('content')

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">

                <h3 class="my-5">Modifier la permission : {{$permission->name}}</h3>

                <form method="POST" action="{{ route('permissions.update', $permission->id) }}" class="pb-5">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $permission->name }}" required>
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