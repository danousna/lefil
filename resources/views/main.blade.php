<!DOCTYPE html>
<html lang="fr">
    <head>
        @include('partials._head')        
    </head>
    <body>
        
        @include('partials._nav')

        @include('partials._messages')

        @yield('content')

        @include('partials._footer')

        @include('partials._javascript')

        @yield('scripts')

    </body>
</html>
