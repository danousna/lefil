<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/LeFil/">Le Fil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php echo ($page == "home" ? "active" : "")?>">
                    <a class="nav-link" href="/LeFil/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item <?php echo ($page == "login" ? "active" : "")?>">
                    <a class="nav-link" href="/LeFil/login/">Connexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>