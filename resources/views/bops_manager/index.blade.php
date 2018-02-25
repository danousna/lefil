@extends('main')

@section('title', 'Bops')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-xl-6 col-lg-8 col-10 mx-auto">
            <div class="div-bubble p-4 my-4">
                <h4>Gestion des bops</h4>
                    
                <p>Avant de publier une bops, assurez vous que le <b>nom de l'uv est valide</b>, sinon les <b>statistiques</b> des bops ne fonctionneront pas correctement.<br>Un nom d'uv valide a <b>deux lettres majuscules suivis d'un numéro</b>. Example : EN21, MT90 etc...

                <div class="table-responsive">
                <table class="table">
                    <tbody>
                    @foreach ($bops as $bop)
                        <tr>
                            <td class="px-0" style="border: none !important;">
                                <b>{{ $bop->uv }}</b> : {{ $bop->body }} <small class="text-muted">| {{ $bop->created_at }}</small>
                            </td>
                            <td class="px-0 text-right" style="border: none !important;">
                                <a href="{{ route('bops_manager.show', $bop->id) }}" class="btn btn-sm btn-success">Publier</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection