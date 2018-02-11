@extends('main')

@section('title', 'Contact')

@section('content')

<!-- Page Header -->
<header class="masthead bg-default" style="height: 250px">
    <div class="container">
        <div class="row">
            <div class="post col-xl-6 col-lg-8 col-11 my-4 p-4">
                <div class="post-heading text-center">
                    <h1 style="font-size: 3rem;">Contactez nous</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-lg-8 col-11 mx-auto p-4 text-center">
            Remplissez le formulaire ci-dessus, nous vous réponderons au plus vite.
        </div>
    </div>
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-11 mx-auto my-4 p-4">
            <form name="sentMessage" id="contactForm" novalidate>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Nom</label>
                        <input type="text" class="form-control" id="name" required>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" required>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Message</label>
                        <textarea rows="5" class="form-control" id="message" required></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                
                <br>
                
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
            </form>
        </div>
    </div>
</div>

@endsection