@extends('layouts.default')

@section('title')
    Entreprises
@endsection

@section('body')
<nav class="navbar navbar-dark bg-dark justify-content-around border-bottom">
    <a class="navbar-brand" href="{{url('/')}}">
        MyPhoneBook
    </a>
    <h1 class="navbar-brand">
        Liste des entreprises
    </h1>
    <form action="{{url('entreprise/search')}}" class="form-check-inline">
        <input type="text" placeholder="rechercher une entreprise" name="recherche" class="form-control mr-sm-2">
        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">rechercher</button>
    </form>
</nav>
<nav class="navbar navbar-dark bg-secondary justify-content-around border-bottom">
    <form action="{{url('entreprise/create')}}" method="post">
        @csrf
        <button class="btn btn-success">Ajouter une entreprise</button>
    </form>
    <form action="{{url('collaborateur')}}" method="get">
        @csrf
        @method('get')
        <button class="btn btn-primary">Voir les collaborateurs</button>
    </form>
</nav>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
        <tr>
            <td>id</td>
            <td>nom</td>
            <td>adresse</td>
            <td>codePostal</td>
            <td>ville</td>
            <td>numeroDeTelephone</td>
            <td>email</td>
            <td>edit</td>
            <td>delete</td>
        </tr>
        </thead>
        @foreach($enterprises as $item)
        <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item['nom']}}</td>
            <td>{{$item['adresse']}}</td>
            <td>{{$item['codePostal']}}</td>
            <td>{{$item['ville']}}</td>
            <td>{{$item['numeroDeTelephone']}}</td>
            <td>{{$item['email']}}</td>
            <td>
                <form action="entreprise/update/{{$item['id']}}" method="POST">
                    @method('GET')
                    @csrf
                    <input class="btn btn-info" type="submit" value="edit">
                </form>
            </td>
            <td>
                <form action="/entreprise/delete/{{$item['id']}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger" type="submit" value="delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <nav class="navbar navbar-dark bg-dark justify-content-around border-bottom">
        {{$enterprises->links()}}
    </nav>
    <style>
        .w-5{display:none;}
    </style>
<nav class="navbar navbar-dark bg-dark justify-content-around border-bottom">
    <form action="{{url('entreprise/create')}}" method="post">
        @csrf
        <button class="btn btn-success">Ajouter une entreprise</button>
    </form>
    <form action="{{url('collaborateur')}}" method="get">
        @csrf
        @method('get')
        <button class="btn btn-primary">Voir les collaborateurs</button>
    </form>
</nav>
@endsection
