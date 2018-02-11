@extends('main')

@section('title', 'Écrire Un Article')

@section('css')
    
    <link href="{{ asset('vendor/simplemde/simplemde.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/editor.css') }}" rel="stylesheet">   

@endsection

@section('content')

<!-- Main Content -->
<div class="container-fluid">
    <div class="row py-4 bg-bubble">
        <div class="div-bubble col-xl-6 col-lg-8 col-11 mx-auto my-4 p-4">
            <form id="article-form" method="POST" action="{{ route('articles.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <input id="title" type="text" class="form-control title" name="title" placeholder="Titre de l'Article" required>
                </div>

                <div class="form-group">
                    <textarea id="body" rows="10" class="form-control" name="body" required></textarea>
                </div>

                <div class="form-group">
                    <select class="form-control" name="category_id">
                        <option value="" disabled selected>Rubrique</option>
                        @foreach ($user->categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <input id="slug" type="text" class="form-control" name="slug" placeholder="Lien" required>
                </div>

                <br>

                <button id="submit-btn" type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    
    <script src="{{ asset('vendor/simplemde/simplemde.min.js') }}"></script>

    <script>
        var simplemde = new SimpleMDE({ 
            element: $("#body")[0],
            spellChecker: false,
            toolbar: [
                {
                    name: "bold",
                    action: SimpleMDE.toggleBold,
                    className: "fas fa-fw fa-bold",
                    title: "Gras",
                },
                {
                    name: "italic",
                    action: SimpleMDE.toggleItalic,
                    className: "fas fa-fw fa-italic",
                    title: "Italique",
                },
                {
                    name: "heading",
                    action: SimpleMDE.toggleHeadingSmaller,
                    className: "fas fa-fw fa-heading",
                    title: "Titre",
                },
                {
                    name: "quote",
                    action: SimpleMDE.toggleBlockquote,
                    className: "fas fa-fw fa-quote-left",
                    title: "Citation",
                },
                {
                    name: "unordered-list",
                    action: SimpleMDE.toggleUnorderedList,
                    className: "fas fa-fw fa-list-ul",
                    title: "Liste non-ordonnée",
                },
                {
                    name: "ordered-list",
                    action: SimpleMDE.toggleOrderedList,
                    className: "fas fa-fw fa-list-ol",
                    title: "Liste ordonnée",
                },
                {
                    name: "link",
                    action: SimpleMDE.drawLink,
                    className: "fas fa-fw fa-link",
                    title: "Insérer un lien",
                },
                {
                    name: "image",
                    action: SimpleMDE.drawImage,
                    className: "far fa-fw fa-image",
                    title: "Insérer une image",
                },
                {
                    name: "table",
                    action: SimpleMDE.drawTable,
                    className: "fas fa-fw fa-table",
                    title: "Insérer un tableau",
                },
                {
                    name: "preview",
                    action: SimpleMDE.togglePreview,
                    className: "fas fa-fw fa-eye no-disable",
                    title: "Aperçu",
                },
                {
                    name: "side-by-side",
                    action: SimpleMDE.toggleSideBySide,
                    className: "fas fa-fw fa-columns no-disable no-mobile",
                    title: "Cote à cote",
                },
                {
                    name: "fullscreen",
                    action: SimpleMDE.toggleFullScreen,
                    className: "fas fa-fw fa-arrows-alt no-disable no-mobile",
                    title: "Plein écran",
                },
                {
                    name: "guide",
                    action: "https://simplemde.com/markdown-guide",
                    className: "fas fa-fw fa-question-circle",
                    title: "Aide Markdown",
                },
            ],
            // promptURLs: true,
        });

        @if ($user->articles()->count() == 0)
            $.get("{{ asset('welcome.md') }}", function(response) {
                simplemde.value(response);
                simplemde.togglePreview();
            });
        @endif

        $("#submit-btn").on('click', function(event) {
            simplemde.toTextArea();
            
            $("#article-form").submit();
        });             
    </script>

@endsection
