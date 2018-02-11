@if (Session::has('success'))
    
    <div class="alert alert-success" role="alert">
        <div class="container">
            <strong>Succès :</strong> {{ Session::get('success') }}
        </div>
    </div>

@endif

@if (Session::has('error'))

    <div class="alert alert-danger" role="alert">
        <div class="container">
            <strong>Erreur :</strong> {{ Session::get('error') }}
        </div>
    </div>

@endif

@if (count($errors) > 0)

    <div class="alert alert-danger" role="alert">
        <div class="container">
            <strong>Erreurs :</strong>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>

@endif