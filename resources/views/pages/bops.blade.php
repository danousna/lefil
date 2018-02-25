@extends('main')

@section('title', 'Bops')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            <h2>Best of Prof's</h2>
        </div>
    </div>
</div>
<div class="bg-bubble">
    <div class="container">
        <div class="row py-4 bg-bubble">
            <div class="col-md-8 col-11 mx-auto">
                <div class="div-bubble my-4 p-4">
                    <h4 class="mb-3">Les dernières Bop's :</h4>

                    <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        @foreach ($bops as $bop)
                            <tr>
                                <td class="px-0 pb-0" style="border: none !important;">
                                    <dl class="row my-0 py-0">
                                        <dt class="col-sm-1">{{ $bop->uv }}</dt>
                                        <dd class="col-sm-10">{{ $bop->body }}</dd>
                                    </dl>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-0 pt-0" style="border: none !important;">
                                    <?php 
                                        $datetime = explode(' ', $bop->created_at); 
                                        $date = explode('-', $datetime[0]);
                                        $date_formatted = $date[2].'/'.$date[1].'/'.$date[0];
                                    ?>
                                    <small class="text-muted">le {{ $date_formatted.' à '.$datetime[1] }}</small>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-11 mx-auto">
                <div class="div-bubble my-4 p-4">
                    <h4 class="mb-3">Soumettre une Bop's :</h4>
                    <form method="POST" action="{{ route('pages.bops') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input name="uv" type="text" class="form-control form-control" id="uv" placeholder="Nom de l'UV (majuscules)" value="{{ old('uv') }}" required>
                        </div>

                        <div class="form-group">
                            <textarea name="body" rows="2" class="form-control form-control" id="body" placeholder="Bop's" required>{{ old('body') }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
                <div class="div-bubble my-4 p-4">
                    <h4 class="mb-3">Statistiques :</h4>
                    <span class="d-block mb-3">Il y au total <b>{{ $bops->count() }}</b> Bop's.</span>
                    <h5 class="mb-2">Par UVs :</h5>
                    @foreach ($uvs as $uv => $value)
                        <dl class="row my-0 py-0">
                            <dd class="col-sm-2">{{ $uv }}</dd>
                            <dd class="col-sm-1">:</dd>
                            <dd class="col-sm-3">{{ $value }}</dd>
                        </dl>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection