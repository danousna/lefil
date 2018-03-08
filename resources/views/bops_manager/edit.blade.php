@extends('main')

@section('title', 'Modifier Une Bops')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <form method="POST" action="{{ route('bops_manager.update', $bops->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <input name="uv" type="text" class="form-control" id="uv" placeholder="Nom de l'UV (majuscules)" value="{{ $bops->uv }}" required>
                </div>

                <div class="form-group">
                    <textarea name="body" rows="4" class="form-control" id="body" placeholder="Bop's" required>{{ $bops->body }}</textarea>
                </div>

                <br>

                <button id="submit-btn" type="submit" class="btn btn-primary">Modifier</button>

                {{ method_field('PUT') }}
            </form>
        </div>
    </div>
</div>

@endsection