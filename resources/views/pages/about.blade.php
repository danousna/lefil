@extends('main')

@section('title', 'À propos')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-12 mx-auto p-4 text-center">
            <h2>À propos du Fil</h2>
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            Le journal des étudiants de l'UTC.
        </div>
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <h4 class="mb-3 title">Crédits</h4>
            <p>Maquette de la version papier (P2018) : <b>Aude et Alex</b></p>
            <p>Réalisation et maintenance du site : <a href="https://github.com/danousna" style="text-decoration: none;"><i class="fab fa-github"></i> <b>Natan</b></a></p>
        </div>
    </div>
</div>

@endsection