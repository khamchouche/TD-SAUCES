@extends('layouts.app')

@section('title', 'Modifier la sauce')

@section('content')
    <div class="container">
        <h1 class="mb-4">Modifier la sauce : {{ $sauce->name }}</h1>

        <!-- Affichage des erreurs de validation -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('sauces.update', $sauce) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nom de la sauce :</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $sauce->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="manufacturer" class="form-label">Fabricant :</label>
                <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="{{ old('manufacturer', $sauce->manufacturer) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $sauce->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="mainPepper" class="form-label">Piment principal :</label>
                <input type="text" name="mainPepper" id="mainPepper" class="form-control" value="{{ old('mainPepper', $sauce->mainPepper) }}" required>
            </div>

            <div class="mb-3">
                <label for="imageUrl" class="form-label">URL de l'image :</label>
                <input type="url" name="imageUrl" id="imageUrl" class="form-control" value="{{ old('imageUrl', $sauce->imageUrl) }}" required>
            </div>

            <div class="mb-3">
                <label for="heat" class="form-label">Niveau de piquant (1-10) :</label>
                <input type="number" name="heat" id="heat" class="form-control" value="{{ old('heat', $sauce->heat) }}" min="1" max="10" required>
            </div>

            <button type="submit" class="btn btn-success">Enregistrer les modifications</button>
            <a href="{{ route('sauces.show', $sauce) }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
