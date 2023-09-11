@extends('layouts.header')

@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
    <div class="row">
    <div class="col-xl-12 col-sm-12 col-12 ">
    <div class="breadcrumb-path mb-4">
    <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active"> Categorie</li>
    </ul>
    <h3>modifier la categorie</h3>
    </div>
    </div>
    <div class="col-xl-12 col-sm-12 col-12 ">
    <div class="card">
    <div class="card-header">
    <h2 class="card-titles">modifier la categorie</h2>
    </div>
    <form action="{{ route('clientcategories.update', $clientcategorie->id) }}" method="post">
        @method('PUT')
        @csrf
        <div class="card-body">
                <div class="row">
                            <div class="col-xl-6 col-sm-12 col-12 ">
                                <div class="form-group">
                                    <input type="text" name="name" value="{{ $clientcategorie->name }}" placeholder="Nom du categorie" required>
                                </div>
                            </div>

                </div>

                <div class="row p-3">
                    <div class="form-group">
                        <button class="btn rounded border bg-primary  shadow  " style="color: white!important">Enregistrer</button>
                    </div>
                </div>
        </div>
    </form>
    </div>
    </div>


    </div>
    </div>
    </div>
    <script>
        function genererTexteAleatoire() {
  let caracteres = "abcdefghijklmnopqrstuvwxyz0123456789"; // Définir les caractères possibles
  let texteAleatoire = "";
  for (let i = 0; i < 30; i++) {
    texteAleatoire += caracteres.charAt(Math.floor(Math.random() * caracteres.length)); // Ajouter un caractère aléatoire au texte
  }
  return texteAleatoire;
}
    </script>
    @endsection