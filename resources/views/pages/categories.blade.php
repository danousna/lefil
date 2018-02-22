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
                    <h5 class="mb-0">
                        <a href="">
                            {{ $category->name }}
                        </a>
                    </h5>
                </div>
                <hr>
            @endforeach

        </div>
    </div>
</div>

@endsection