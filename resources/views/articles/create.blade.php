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
        <div class="col-md-8 col-12 mx-auto my-4 p-4 div-bubble">
            <form id="article-form" method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <input id="title" type="text" class="form-control title" name="title" placeholder="Titre de l'Article" value="{{ old('title') }}" required>
                </div>

                <div class="form-group file-input">
                    <input type="file" id="image" name="image">
                    <span class="btn btn-secondary mr-3">Image de couverture</span>
                    <span class="label" data-js-label>Aucun ficher sélectionné</span>
                    <br>
                    <small class="text-muted">L'image de couverture est facultative (mais ça rends beaucoup mieux quand même)</small>
                </div>

                <div class="form-group">
                    <textarea id="body" rows="10" class="form-control" name="body" required>{{ old('body') }}</textarea>
                </div>

                <div class="form-group">
                    <div class="select">
                        <select class="form-control" name="category_id">
                            <option value="" disabled selected>Rubrique</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category_id') == $category->id) ? "selected" : "" }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <div class="select__arrow"></div>
                    </div>
                </div>

                @hasanyrole('member|admin|president')
                    <div class="form-group">
                        <div class="select">
                            <select class="form-control" name="issue_id">
                                <option value="" selected>Cet article ne fait pas partie d'un numéro</option>
                                @foreach ($issues as $issue)
                                    <option value="{{ $issue->id }}" {{ (old('issue_id') == $issue->id) ? "selected" : "" }}>n°{{ $issue->number }} {{ ($issue->titre != "") ? "- ".$issue->titre : "" }}</option>
                                @endforeach
                            </select>
                            <div class="select__arrow"></div>
                        </div>
                    </div>
                @endhasanyrole

                <div class="form-group">
                    <input id="slug" type="text" class="form-control" name="slug" placeholder="Lien" value="{{ old('slug') }}" required>
                    <small class="text-muted">Le lien est un identifiant unique pour tous les articles. Si vous n'avez pas d'idées, mettez le titre de votre article séparé par des tirets. (ex : <b>test-lien-article</b>)</small>
                </div>

                <div class="form-group">
                    <input type="checkbox" name="anonymous" id="anonymous" value="anonymous" {{ old('anonymous') ? "checked" : "" }}> 
                    <label for="anonymous">Auteur anonyme</label>
                </div>

                <br>

                <button id="submit-btn" type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>

<div id="helpModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="title">Aide Markdown</h3>
                <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body article">
                {!! $mdhelp !!}
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    
    <script src="{{ asset('js/file_input.js') }}"></script>

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
                    action: openHelpModal,
                    className: "fas fa-fw fa-question-circle",
                    title: "Aide Markdown",
                },
            ],
            // promptURLs: true,
        });

        function openHelpModal(editor) {
            $('#helpModal').modal({show:true});
        }

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
