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
                <div class="row mx-auto my-4">
                    <div class="col-md-6 col-12 mx-auto p-4 div-bubble">
                        <h4 class="mb-3 title">Les dernières Bop's</h4>

                        @foreach ($latests as $bop)
                            <div id="{{ $bop->id }}">
                                <b>{{ $bop->uv }}</b> : {{ $bop->body }}
                                <br>
                                <?php 
                                    $datetime = explode(' ', $bop->created_at); 
                                    $date = explode('-', $datetime[0]);
                                    $date_formatted = $date[2].'/'.$date[1].'/'.$date[0];
                                ?>
                                @auth
                                    @if (Auth::user()->bops_likes()->get()->contains($bop))
                                        <form method="POST" action="{{ route('pages.unlikeBops', $bop->id) }}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-like"><i class="fas fa-thumbs-up mr-1"></i> <span>{{ $bop->users->count() }} j'aime</span></button>
                                            <small class="text-muted">{{ $date_formatted }}</small>
                                            {{ method_field('PUT') }}
                                        </form>
                                    @else 
                                        <form method="POST" action="{{ route('pages.likeBops', $bop->id) }}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-like"><i class="far fa-thumbs-up mr-1"></i> <span>{{ $bop->users->count() }} j'aime</span></button>
                                            <small class="text-muted">{{ $date_formatted }}</small>
                                            {{ method_field('PUT') }}
                                        </form>
                                    @endif
                                @endauth
                                @guest
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Connectez vous">
                                        <button class="btn btn-like"><i class="far fa-thumbs-up mr-1"></i> <span>{{ $bop->users->count() }} j'aime</span></button>
                                    </span>
                                    <small class="text-muted">{{ $date_formatted }}</small>
                                @endguest
                            </div>
                            <br>
                        @endforeach
                    </div>

                    <div class="col-md-6 col-12 mx-auto p-4 div-bubble">
                        <h4 class="mb-3 title">Le podium</h4>

                        @foreach ($bests as $bop)
                            <div id="{{ $bop->id }}">
                                <b>{{ $bop->uv }}</b> : {{ $bop->body }}
                                <br>
                                <?php 
                                    $datetime = explode(' ', $bop->created_at); 
                                    $date = explode('-', $datetime[0]);
                                    $date_formatted = $date[2].'/'.$date[1].'/'.$date[0];
                                ?>
                                @auth
                                    @if (Auth::user()->bops_likes()->get()->contains($bop))
                                        <form method="POST" action="{{ route('pages.unlikeBops', $bop->id) }}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-like"><i class="fas fa-thumbs-up mr-1"></i> <span>{{ $bop->users->count() }} j'aime</span></button>
                                            <small class="text-muted">{{ $date_formatted }}</small>
                                            {{ method_field('PUT') }}
                                        </form>
                                    @else 
                                        <form method="POST" action="{{ route('pages.likeBops', $bop->id) }}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-like"><i class="far fa-thumbs-up mr-1"></i> <span>{{ $bop->users->count() }} j'aime</span></button>
                                            <small class="text-muted">{{ $date_formatted }}</small>
                                            {{ method_field('PUT') }}
                                        </form>
                                    @endif
                                @endauth
                                @guest
                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Connectez vous">
                                        <button class="btn btn-like"><i class="far fa-thumbs-up mr-1"></i> <span>{{ $bop->users->count() }} j'aime</span></button>
                                    </span>
                                    <small class="text-muted">{{ $date_formatted }}</small>
                                @endguest
                            </div>
                            <br>
                        @endforeach
                    </div>
                </div>

                <div class="div-bubble my-4 p-4">
                    <h4 class="mb-3 title">Toutes les Bop's</h4>

                    @foreach ($bops as $bop)
                        <div id="{{ $bop->id }}">
                            <b>{{ $bop->uv }}</b> : {{ $bop->body }}
                            <br>
                            <?php 
                                $datetime = explode(' ', $bop->created_at); 
                                $date = explode('-', $datetime[0]);
                                $date_formatted = $date[2].'/'.$date[1].'/'.$date[0];
                            ?>
                            @auth
                                @if (Auth::user()->bops_likes()->get()->contains($bop))
                                    <form method="POST" action="{{ route('pages.unlikeBops', $bop->id) }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-like"><i class="fas fa-thumbs-up mr-1"></i> <span>{{ $bop->users->count() }} j'aime</span></button>
                                        <small class="text-muted">{{ $date_formatted }}</small>
                                        {{ method_field('PUT') }}
                                    </form>
                                @else 
                                    <form method="POST" action="{{ route('pages.likeBops', $bop->id) }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-like"><i class="far fa-thumbs-up mr-1"></i> <span>{{ $bop->users->count() }} j'aime</span></button>
                                        <small class="text-muted">{{ $date_formatted }}</small>
                                        {{ method_field('PUT') }}
                                    </form>
                                @endif
                            @endauth
                            @guest
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Connectez vous">
                                    <button class="btn btn-like"><i class="far fa-thumbs-up mr-1"></i> <span>{{ $bop->users->count() }} j'aime</span></button>
                                </span>
                                <small class="text-muted">{{ $date_formatted }}</small>
                            @endguest
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4 col-11 mx-auto">
                <div class="div-bubble my-4 p-4">
                    <h4 class="mb-3 title">Soumettre une Bop's</h4>
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
                    <h4 class="mb-3 title">Statistiques</h4>
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