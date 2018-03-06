<!-- Footer -->
<footer>
    <div class="container">
        <div class="row py-4">
            <div class="col-md-6 mb-4">
                <div class="text-center logo">
                    <img style="width: 70px" src="{{ asset('Logo-gray.svg') }}">
                </div>
                <h6 class="mt-3 title">Le journal des étudiants de l'UTC</h6>
                <span class="about">Le Fil est le torchon bimensuel gratuit des étudants tiré à 600 exemplaires. Chaque article n'engage que la responsabilité de son auteur.</span>
            </div>
            <div class="col-md-6">     
                <div class="row">
                   <div class="col-6"> 
                        <small class="d-block title mb-2">Découvrir :</small>
                        <a href="/rubriques" class="about site-map-link">Rubriques</a><br>
                        <a href="/numéros" class="about site-map-link">Numéros</a><br>
                        <a href="/bops" class="about site-map-link">Bops</a><br>
                        <a href="/spotted" class="about site-map-link">Spotted</a>
                    </div>
                    <div class="col-6">                     
                        <small class="d-block title mb-2">L'association :</small>
                        <a href="/about" class="about site-map-link">À propos</a><br>
                        <a href="/contact" class="about site-map-link">Contact</a><br>
                        <a href="/archive" class="about site-map-link">Archive</a><br>
                        @if (!Auth::check())
                            <a href="/register" class="about site-map-link">Inscription</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
