@extends('main')

@section('title', 'Modifier Un Numéro')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-11 mx-auto my-4 p-4">
            <form method="POST" action="{{ route('issues.update', $issue->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="number">Numéro</label>
                    <input type="number" name="number" id="number" class="form-control" value="{{ $issue->number }}" required>
                </div>

                <div class="form-group">
                    <label for="titre">Titre du numéro <small class="text-muted">(facultatif)</small></label>
                    <input type="text" name="titre" id="titre" class="form-control" value="{{ $issue->titre }}">
                </div>

                <div class="form-group">
                    <label for="release_date">Date de parution</label>
                    <input type="date" name="release_date" class="form-control" value="{{ $issue->release_date }}" required>    
                </div>

                <div class="form-group file-input">
                    <label for="pdf">Fichier pdf du numéro</label>
                    <br>
                    <input type="file" name="pdf" id="pdf">
                    <span class="btn btn-secondary mr-3">Choisir le fichier</span>
                    <span class="label" data-js-label>Aucun ficher sélectionné</label>
                </div>

                <br>

                <input type="submit" value="Modifier" class="btn btn-primary">

                {{ method_field('PUT') }}
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    
    <script src="{{ asset('js/file_input.js') }}"></script>

@endsection