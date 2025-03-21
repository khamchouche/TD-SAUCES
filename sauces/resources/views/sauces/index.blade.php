@extends('layouts.app')

@section('title', 'Liste des sauces')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">🌶️ Liste des Sauces 🔥</h1>

        <!-- Bouton pour ajouter une nouvelle sauce -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('sauces.create') }}" class="btn btn-primary">➕ Ajouter une sauce</a>
        </div>

        <!-- Vérifier s'il y a des sauces -->
        @if ($sauces->isEmpty())
            <div class="alert alert-warning text-center">Aucune sauce disponible pour le moment.</div>
        @else
            <div class="row">
                @foreach($sauces as $sauce)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="{{ $sauce->imageUrl }}" class="card-img-top" alt="{{ $sauce->name }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $sauce->name }}</h5>
                                <p class="card-text"><strong>Fabricant :</strong> {{ $sauce->manufacturer }}</p>
                                <p class="card-text"><strong>Piment principal :</strong> {{ $sauce->mainPepper }}</p>
                                <p class="card-text"><strong>🔥 Intensité :</strong> {{ $sauce->heat }} / 10</p>

                                <div class="mt-auto">
                                    <a href="{{ route('sauces.show', $sauce) }}" class="btn btn-outline-dark w-100">👀 Voir</a>

                                    @auth
                                        @if(Auth::id() === $sauce->userId)
                                            <a href="{{ route('sauces.edit', $sauce) }}" class="btn btn-outline-primary w-100 mt-2">✏️ Modifier</a>
                                            <form action="{{ route('sauces.destroy', $sauce) }}" method="POST" class="mt-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('Voulez-vous supprimer cette sauce ?')">🗑️ Supprimer</button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
