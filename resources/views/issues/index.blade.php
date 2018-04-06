@extends('main')

@section('title', 'Numéros')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <h4>Gestion des numéros</h4>

            <div class="table-responsive">
            <table class="table">
                <tbody>
                @foreach ($issues as $issue)
                    <?php $issue->release_date = explode(' ', $issue->release_date)[0]; ?>
                    <tr>
                        <td class="px-0" style="border: none !important;">
                            <a class="mr-2" href="{{ route('issues.show', $issue->id) }}">n°{{ $issue->number }}</a>
                        </td>
                        <td class="px-0" style="border: none !important;">
                            {{ $issue->titre }}
                        </td>
                        <td class="px-0 text-center" style="border: none !important;">
                            <small>
                                <?php 
                                    $date = new DateTime($issue->release_date);
                                ?>
                                {{ $date->format('d/m/Y') }}
                            </small>
                        </td>
                        @if ($issue->status == "published")
                            <td class="px-0 text-right" style="border: none !important;">
                                <small class="text-success">Publié</small>
                            </td>
                        @else
                            <td class="px-0" style="border: none !important;">
                            </td>
                        @endif
                        <td class="px-0 text-right" style="border: none !important;">
                            <a href="{{ route('issues.show', $issue->id) }}" class="btn btn-secondary btn-sm">Voir</a>
                            <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-secondary btn-sm">Modifier</a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteForm{{ $issue->id }}">Supprimer</button>

                            <div class="modal fade" id="deleteForm{{ $issue->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <form method="POST" action="{{ route('issues.destroy', $issue->id) }}">
                                                {{ csrf_field() }}
                                                <span>Êtes-vous sûr de vouloir supprimer ce numéro ?</span>
                                                <hr>
                                                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Annuler</button>
                                                <input type="submit" value="Supprimer" class="btn btn-danger btn-sm">
                                                {{ method_field('DELETE') }}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <hr>

            <a href="{{ route('issues.create') }}" class="btn btn-primary">Créer un numéro</a>
        </div>
    </div>
</div>

@endsection