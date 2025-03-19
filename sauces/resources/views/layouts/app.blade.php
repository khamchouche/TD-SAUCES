<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Application de Sauces')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark p-3">
    <a href="{{ route('sauces.index') }}" class="navbar-brand">SauceApp</a>
    @auth
        <span class="text-white me-3">Bienvenue, {{ Auth::user()->email }}</span>
        <a href="{{ route('logout') }}" class="btn btn-danger">Déconnexion</a>
    @else
        <a href="{{ route('login') }}" class="btn btn-success">Connexion</a>
        <a href="{{ route('register') }}" class="btn btn-primary">Inscription</a>
    @endauth
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<footer class="text-center py-4 bg-light mt-5">
    <p>&copy; {{ date('Y') }} SauceApp - Tous droits réservés</p>
</footer>
</body>
</html>
