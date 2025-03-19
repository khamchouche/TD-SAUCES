@extends('layouts.app')

@section('title', 'Ajouter une sauce')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Ajouter une nouvelle sauce</h2>

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

        <form action="{{ route('sauces.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nom de la sauce :</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="manufacturer" class="form-label">Fabricant :</label>
                <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="{{ old('manufacturer') }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="mainPepper" class="form-label">Ingrédient principal :</label>
                <input type="text" name="mainPepper" id="mainPepper" class="form-control" value="{{ old('mainPepper') }}" required>
            </div>

            <div class="mb-3">
                <label for="imageUrl" class="form-label">URL de l'image :</label>
                <input type="url" name="imageUrl" id="imageUrl" class="form-control" value="{{ old('imageUrl') }}" required>
            </div>

            <div class="mb-3">
                <label for="heat" class="form-label">Niveau de piquant (1-10) :</label>
                <input type="number" name="heat" id="heat" class="form-control" value="{{ old('heat') }}" min="1" max="10" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter la sauce</button>
            <a href="{{ route('sauces.index') }}" class="btn btn-secondary">Retour</a>
        </form>
    </div>
@endsection
