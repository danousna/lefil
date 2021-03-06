@extends('main')

@section('title', "Numéros")

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            <h2>Numéros</h2>
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">

            @foreach ($issues->where('status', 'published') as $issue)
                <div>
                    <a href="{{ route('pages.issue', $issue->number)}}"><b>n°{{ $issue->number }}</b> {{($issue->titre != "") ? "- ".$issue->titre : "" }}</a>
                    <span class="ml-3 text-muted">
                        <?php 
                            $date = new DateTime($issue->release_date);
                        ?>
                        {{ $date->format('d/m/Y') }}
                    </span>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection