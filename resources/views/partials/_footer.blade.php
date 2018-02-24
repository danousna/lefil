<!-- Footer -->
<footer>
    <div class="container px-4">
        <div class="row">
            <div class="col-sm py-4 mr-4">
                <div class="text-center logo">
                    <a href="/"><img src="{{ asset('img/Logo-gray.svg') }}" width="100px"></a>
                </div>
                <h6 class="mt-2">Le journal des étudiants de l'UTC</h6>
                <span class="about">Le Fil est le torchon bimensuel gratuit des étudants tiré à 600 exemplaires. Chaque article n'engage que la responsabilité de son auteur.</span>
            </div>
            <div class="col-sm py-4 mr-4">
                <h6 class="mb-4">Le Fil</h6>
                <a href="/about" class="about">À propos</a><br>
                <a href="/contact" class="about">Contact</a><br>
                <a href="/rubriques" class="about">Rubriques</a><br>
                <a href="/numéros" class="about">Numéros</a><br>
                @if (!Auth::check())
                    <a href="/register" class="about">Inscription</a><br>
                @endif
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
