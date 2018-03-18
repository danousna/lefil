@extends('main')

@section('title', 'Contact')

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-12 mx-auto p-4 text-center">
            <h2>Contactez nous</h2>
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <form method="POST" action="/contact">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nom</label>
                    <input name="name" type="text" class="form-control" id="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email" required>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" rows="5" class="form-control" id="message" required></textarea>
                </div>
                
                <br>
                
                <button type="submit" class="btn btn-primary ladda-button"><span class="label">Envoyer</span> <span class="spinner"></span></button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    
    <script src="{{ asset('js/btn_load.js') }}"></script>

@endsection