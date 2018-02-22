@extends('main')

@section('title', 'Rubriques')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-xl-6 col-lg-8 col-10 mx-auto">
            <div class="div-bubble p-4 my-4">
                <h4>Gestion des rubriques</h4>

                <div class="table-responsive">
                <table class="table">
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="px-0" style="border: none !important;">
                                <a class="mr-2" href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                            </td>
                            <td class="px-0 text-right" style="border: none !important;">
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-secondary btn-sm">Voir</a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary btn-sm">Modifier</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <hr>

                <a href="{{ route('categories.create') }}" class="btn btn-primary">Créer une rubrique</a>
            </div>
        </div>
    </div>
</div>

@endsection