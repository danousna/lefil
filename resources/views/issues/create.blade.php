@extends('main')

@section('title', 'Créer Un Numéro')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-11 mx-auto my-4 p-4">
            <form method="POST" action="{{ route('issues.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="number">Numéro</label>
                    <input type="number" name="number" id="number" class="form-control" value="{{ old('number') }}" required>
                </div>

                <div class="form-group">
                    <label for="titre">Titre du numéro <small class="text-muted">(facultatif)</small></label>
                    <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre') }}">
                </div>

                <div class="form-group">
                    <label for="released_date">Date de parution</label>
                    <input type="date" name="release_date" class="form-control" value="{{ old('release_date') }}" required>    
                </div>

                <br>

                <input type="submit" value="Créer" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

@endsection