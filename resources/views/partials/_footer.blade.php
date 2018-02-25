<!-- Footer -->
<footer>
    <div class="container px-4">
        <div class="row">
            <div class="col-sm py-4">
                <div class="text-center logo">
                    <a href="/"><img src="{{ asset('img/Logo-gray.svg') }}" width="100px"></a>
                </div>
                <h6 class="mt-2">Le journal des étudiants de l'UTC</h6>
                <span class="about">Le Fil est le torchon bimensuel gratuit des étudants tiré à 600 exemplaires. Chaque article n'engage que la responsabilité de son auteur.</span>
            </div>
            <div class="col-sm py-4">
                <h5>Le Fil</h5>               
                <div class="row">
                   <div class="col-sm"> 
                        <small class="d-block mb-2 mt-3">Découvrir :</small>
                        <a href="/rubriques" class="about site-map-link">Rubriques</a><br>
                        <a href="/numéros" class="about site-map-link">Numéros</a><br>
                        <a href="/bops" class="about site-map-link">Bops</a><br>
                        <a href="/spotted" class="about site-map-link">Spotted</a>
                    </div>
                    <div class="col-sm">                     
                        <small class="d-block mb-2 mt-3">L'association :</small>
                        <a href="/about" class="about site-map-link">À propos</a><br>
                        <a href="/contact" class="about site-map-link">Contact</a><br>
                        <a href="/archive" class="about site-map-link">Archive</a><br>
                        @if (!Auth::check())
                            <a href="/register" class="about site-map-link">Inscription</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm">
            </div>
        </div>
        <div class="row">
            <div class="col pb-3">
                <span class="about">Le Fil est une association étudiante de l'UTC.</span>
            </div>
        </div>
    </div>
</footer>
