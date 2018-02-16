<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container">
        @if (Auth::check())
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/Logo.svg') }}">
            </a>
            <a class="normal-link font-weight-light {{ Request::is('user/'.Auth::user()->username) ? "active" : "" }}" href="{{ route('pages.user', Auth::user()->username) }}" style="letter-spacing: 1px;">
                {{ Auth::user()->username }}
            </a>
        @else
            <a class="navbar-brand" href="/"><img src="{{ asset('img/Logo.svg') }}"></a>
        @endif
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? "active" : "" }}" href="/">Accueil</a>
                </li>
                
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('articles/create') ? "active" : "" }}" href="{{ route('articles.create') }}">Écrire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('articles') ? "active" : "" }}" href="/articles">Mes Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('account') ? "active" : "" }}" href="/account">Mon Compte</a>
                    </li>

                    @hasanyrole('admin|president')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Gestion</a>
                            <div class="dropdown-menu">
                                
                                <h6 class="dropdown-header">Gestion des contenus</h6>
                                <a class="dropdown-item" href="/categories"><i class="fas fa-list-alt fa-fw"></i> Rubriques</a>

                                @role('admin')
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Gestion du site</h6>
                                    <a class="dropdown-item" href="/users"><i class="fas fa-users fa-fw"> </i> Utilisateurs</a>
                                    <a class="dropdown-item" href="/permissions"><i class="far fa-check-square fa-fw"></i> Permissions</a>
                                    <a class="dropdown-item" href="/roles"><i class="fas fa-user fa-fw"></i> Rôles</a>
                                @endrole

                            </div>
                        </li>
                    @endhasanyrole

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Déconnexion
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
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
        </div>
    </div>
</nav>