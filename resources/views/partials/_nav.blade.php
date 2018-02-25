<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ asset('img/Logo.svg') }}"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? "active" : "" }}" href="/">Accueil</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Découvrir</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/rubriques">Rubriques</a>
                        <a class="dropdown-item" href="/numéros">Numéros</a>
                    </div>
                </li>
                
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('articles/create') ? "active" : "" }}" href="{{ route('articles.create') }}">Écrire</a>
                    </li>

                    @hasanyrole('member|admin|president')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Gestion</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/publish"><i class="fas fa-check-square fa-fw"></i> Publications</a>
                                @hasanyrole('admin|president')
                                    <a class="dropdown-item" href="/categories"><i class="fas fa-list-alt fa-fw"></i> Rubriques</a>
                                    <a class="dropdown-item" href="/issues"><i class="fas fa-book fa-fw"></i> Numéros</a>
                                @endhasanyrole
                                @role('admin')
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/users"><i class="fas fa-users fa-fw"> </i> Utilisateurs</a>
                                    <a class="dropdown-item" href="/permissions"><i class="far fa-check-square fa-fw"></i> Permissions</a>
                                    <a class="dropdown-item" href="/roles"><i class="fas fa-user fa-fw"></i> Rôles</a>
                                @endrole
                            </div>
                        </li>
                    @endhasanyrole

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('user/'.Auth::user()->username) ? "active" : "" }}" href="#" data-toggle="dropdown">{{ Auth::user()->username }}</a>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="/articles"><i class="fas fa-list-alt fa-fw"></i> Mes articles</a>
                            <a class="dropdown-item" href="{{ route('pages.user', Auth::user()->username) }}"><i class="fas fa-user fa-fw"></i> Page publique</a>
                             <a class="dropdown-item" href="/account"><i class="fas fa-cog fa-fw"></i> Paramètres</a>
                             <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-fw"></i> Déconnexion</a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </li>

                @else 

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? "active" : "" }}" href="/about">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact') ? "active" : "" }}" href="/contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('register') ? "active" : "" }}" href="{{ route('register') }}">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('login') ? "active" : "" }}" href="{{ route('login') }}">Connexion</a>
                    </li>

                @endif
            </ul>

            <div class="ml-md-2">
                <div id="aa-input-container" class="aa-input-container input-group search-div">
                    <input id="aa-search-input" class="aa-input-search form-control search-input" type="search" placeholder="Rechercher des articles" name="search" autocomplete="off">
                </div>
            </div>
        </div>
    </div>
</nav>