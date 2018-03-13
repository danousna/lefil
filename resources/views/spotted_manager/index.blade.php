@extends('main')

@section('title', 'Spotted')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <h4>Gestion de Spotted</h4>              
            {{-- <p>
                <h5>Attention :</h5> 
                Avant de publier une bops, assurez vous que le <b>nom de l'uv est valide</b>, sinon les <b>statistiques</b> des bops ne fonctionneront pas correctement.<br><small>(Un nom d'uv valide à <b>deux lettres majuscules suivis d'un numéro</b>. Example : EN21, MT90 etc...)</small>
            </p> --}}
            <div class="table-responsive">
            <table class="table">
                <tbody>
                @foreach ($spotted as $spot)
                    <tr>
                        <td class="px-0" style="border: none !important;">
                            {{ $spot->body }} <small class="text-muted">| {{ $spot->created_at }}</small>
                        </td>
                        <td class="px-0 text-right" style="border: none !important;">
                            <a href="{{ route('spotted_manager.edit', $spot->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                            <a href="{{ route('spotted_manager.show', $spot->id) }}" class="btn btn-sm btn-success">Publier</a>
                            <form method="POST" action="{{ route('spotted_manager.destroy', $spot->id) }}" style="display: inline-block;">
                                {{ csrf_field() }}

                                <input type="submit" value="Supprimer" class="btn btn-danger btn-sm">
                                {{ method_field('DELETE') }}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection