@extends('layouts.app')

@section('content')
    <h1>Liste des sauces</h1>
    <a href="{{ route('sauces.create') }}">Ajouter une sauce</a>
    <ul>
        @foreach($sauces as $sauce)
            <li>
                <a href="{{ route('sauces.show', $sauce) }}">{{ $sauce->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection
