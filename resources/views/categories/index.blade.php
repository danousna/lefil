@extends('main')

@section('title', 'Rubriques')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            Gestion des rubriques
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-11 mx-auto my-4 p-4">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="font-size: 1rem">
                    <thead>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <th>{{ $category->id }}</th>
                            <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
                            <td>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-secondary btn-sm">Voir</a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary btn-sm">Modifier</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <br>

            <a href="{{ route('categories.create') }}" class="btn btn-primary">Ajouter une rubrique</a>

        </div>
    </div>
</div>

@endsection