@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">{{ $sauce->name }}</h1>

        <div class="card">
            <img src="{{ $sauce->imageUrl }}" class="card-img-top" alt="Image de la sauce">

            <div class="card-body">
                <h5 class="card-title">Fabricant : {{ $sauce->manufacturer }}</h5>
                <p class="card-text"><strong>Description :</strong> {{ $sauce->description }}</p>
                <p class="card-text"><strong>Piment principal :</strong> {{ $sauce->mainPepper }}</p>
                <p class="card-text"><strong>Intensité :</strong> 🔥 {{ $sauce->heat }} / 10</p>

                <p class="card-text"><strong>Nombre de likes :</strong> 👍
                    {{ is_array($sauce->usersLiked) ? count($sauce->usersLiked) : 0 }}
                </p>

                <p class="card-text"><strong>Nombre de dislikes :</strong> 👎
                    {{ is_array($sauce->usersDisliked) ? count($sauce->usersDisliked) : 0 }}
                </p>

                <a href="{{ route('sauces.index') }}" class="btn btn-secondary">Retour à la liste</a>

                @auth
                    @if(Auth::id() === $sauce->userId)
                        <a href="{{ route('sauces.edit', $sauce) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('sauces.destroy', $sauce) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette sauce ?')">Supprimer</button>
                        </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
@endsection
