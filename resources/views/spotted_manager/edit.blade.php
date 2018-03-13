@extends('main')

@section('title', 'Modifier Un Message')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <form method="POST" action="{{ route('spotted_manager.update', $spotted->id) }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <textarea name="body" rows="4" class="form-control" id="body" placeholder="Message" required>{{ $spotted->body }}</textarea>
                </div>

                <br>

                <button id="submit-btn" type="submit" class="btn btn-primary">Modifier</button>

                {{ method_field('PUT') }}
            </form>
        </div>
    </div>
</div>

@endsection