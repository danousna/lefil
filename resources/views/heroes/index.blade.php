@extends('main')

@section('title', "Configurer la page d'accueil")

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <form method="POST" action="{{ route('heroes.store') }}">
                {{ csrf_field() }}
                
                <h5 class="mt-3">Premier article :</h5>
                <select name="premier">
                    <option selected disabled>Choisissez</option>
                    @foreach ($articles as $article)
                        <option value="{{ $article->id }}" {{ ($heroes->where('type', 'premier')->first()->article_id == $article->id) ? "selected" : "" }}>{{ $article->title }}</option>
                    @endforeach
                </select>

                <h5 class="mt-3">Second article :</h5>
                <select name="second">
                    <option selected disabled>Choisissez</option>
                    @foreach ($articles as $article)
                        <option value="{{ $article->id }}" {{ ($heroes->where('type', 'second')->first()->article_id == $article->id) ? "selected" : "" }}>{{ $article->title }}</option>
                    @endforeach
                </select>

                <h5 class="mt-3">Dernier article :</h5>
                <select name="dernier">
                    <option selected disabled>Choisissez</option>
                    @foreach ($articles as $article)
                        <option value="{{ $article->id }}" {{ ($heroes->where('type', 'dernier')->first()->article_id == $article->id) ? "selected" : "" }}>{{ $article->title }}</option>
                    @endforeach
                </select>

                <br>
                <br>

                <button id="submit-btn" type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>

@endsection