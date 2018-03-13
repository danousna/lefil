@extends('main')

@section('title', 'Spotted')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            <h2>Spotted</h2>
        </div>
    </div>
</div>
<div class="bg-bubble">
    <div class="container">
        <div class="row py-4 bg-bubble">
            <div class="col-md-8 col-11 mx-auto">
                <div class="div-bubble my-4 p-4">
                    @foreach ($latests as $spot)
                        <div id="{{ $spot->id }}">
                            {{ $spot->body }}
                            <br>
                            <?php 
                                $datetime = explode(' ', $spot->created_at); 
                                $date = explode('-', $datetime[0]);
                                $date_formatted = $date[2].'/'.$date[1].'/'.$date[0];
                            ?>
                            @auth
                                @if (Auth::user()->spotted_likes()->get()->contains($spot))
                                    <form method="POST" action="{{ route('pages.unlikeSpotted', $spot->id) }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-like"><i class="fas fa-thumbs-up mr-1"></i> <span>{{ $spot->users->count() }} j'aime</span></button>
                                        <small class="text-muted">{{ $date_formatted }}</small>
                                        {{ method_field('PUT') }}
                                    </form>
                                @else 
                                    <form method="POST" action="{{ route('pages.likeSpotted', $spot->id) }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-like"><i class="far fa-thumbs-up mr-1"></i> <span>{{ $spot->users->count() }} j'aime</span></button>
                                        <small class="text-muted">{{ $date_formatted }}</small>
                                        {{ method_field('PUT') }}
                                    </form>
                                @endif
                            @endauth
                            @guest
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Connectez vous">
                                    <button class="btn btn-like"><i class="far fa-thumbs-up mr-1"></i> <span>{{ $spot->users->count() }} j'aime</span></button>
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
                    <h4 class="mb-3 title">Écrire un message</h4>
                    <form method="POST" action="{{ route('pages.spotted') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <textarea name="body" rows="6" class="form-control form-control" id="body" placeholder="Message" required>{{ old('body') }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection