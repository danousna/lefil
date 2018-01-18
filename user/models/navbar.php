<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/LeFil/">Le Fil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php echo ($page == "account" ? "active" : "")?>">
                    <a class="nav-link" href="/LeFil/user/account/">Mon compte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page == "write" ? "active" : "")?>" href="/LeFil/user/write/">Écrire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($page == "contact" ? "active" : "")?>" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/LeFil/logout/">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>