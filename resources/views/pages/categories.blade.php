@extends('main')

@section('title', "Rubriques")

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            <h2>Rubriques</h2>
        </div>
    </div>
    <div class="row py-4 pb-5 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-10 mx-auto my-4 p-4">

            @foreach ($categories as $category)
                <div class="article">
                    <h4>
                        <a href="{{ route('pages.category', $category->id)}}">
                            {{ $category->name }}
                        </a>
                    </h4>
                    @if ($category->articles->where('status', 'published')->count() > 0)
                        <span class="text-muted">Derniers articles :</span>
                        <br>
                        <div class="ml-3"> 
                        @foreach ($category->articles->where('status', 'published') as $article)
                            <a class="title" href="">
                                {{ $article->title }}
                            </a>
                        @endforeach
                        </div>
                    @endif
                </div>
                <hr>
            @endforeach

        </div>
    </div>
</div>

@endsection