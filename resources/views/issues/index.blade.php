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
                            <a class="mr-2" href="{{ route('issues.show', $issue->id) }}">{{ $issue->titre }}</a>
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
                            <form method="POST" action="{{ route('issues.destroy', $issue->id) }}">
                                {{ csrf_field() }}
                                <a href="{{ route('issues.show', $issue->id) }}" class="btn btn-secondary btn-sm">Voir</a>
                                <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-secondary btn-sm">Modifier</a>
                                
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Les articles liés ne seront pas supprimés.">
                                    <input type="submit" value="Supprimer" class="btn btn-danger btn-sm">
                                </span>

                                {{ method_field('DELETE') }}
                            </form>
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