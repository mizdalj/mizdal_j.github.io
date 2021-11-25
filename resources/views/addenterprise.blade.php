@extends('layouts.default')

@section('title')
    Ajout entreprise
@endsection

@section('body')

    <h1>Ajout entreprise</h1>
    <form action="createforme" method="POST">
        @csrf
        <input type="text" name="nom" placeholder="nom de l'entreprise"> <br>
        <input type="text" name="adresse" placeholder="adresse"> <br>
        <input type="text" name="codePostal" pattern="[0-9]*" placeholder="code postal"> <br>
        <input type="text" name="ville" placeholder="ville"> <br>
        <input type="text" name="numeroDeTelephone" placeholder="numero de telephone"> <br>
        <input type="email" name="email" placeholder="email"> <br>
        <button type="submit">Ajouter</button>
    </form>

@endsection
