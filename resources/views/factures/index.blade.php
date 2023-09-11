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
    <li class="breadcrumb-item active"> Factures</li>
    </ul>
</div>
    <div>

    </div>

    <div class="accordion col-xl-12 col-sm-12 col-12 pb-3" id="mon-accordeon">

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="true" aria-controls="collapse">
                <h3>Ajouter  une facture</h3>
            </button>
          </h2>
          <div id="collapse" class="accordion-collapse collapse " aria-labelledby="heading" data-bs-parent="#mon-accordeon">
            <div class="accordion-body">
                <div class="col-xl-12 col-sm-12 col-12 ">
                    <div class="card">
                            <div class="card-header">
                                    <h2 class="card-titles">Ajouter une factures</h2>
                                    <form action="{{ route('add_facture') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="month" name="month" class="form-control"  placeholder="ex: +243 9740 80 251" required>

                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary">Ajouter</button>
                                            </div>
                                    </form>
                            </div>

                    </div>
                </div>
            </div>
          </div>
        </div>

      </div>
    </div>



    <div class="col-xl-12 col-sm-12 col-12 mb-4">
        <div class="card">
                <div class="table-heading">
                <h2>Factures</h2>
                </div>
        <div class="table-responsive">
        <table class="table  custom-table no-footer">
            <thead>
                <tr>
                        <th>clients</th>
                        <th>montant</th>
                        <th>categorie client</th>
                        <th>mois</th>
                        <th>payement</th>
                        <th>--</th>
                        <th>--</th>


                </tr>
            </thead>
        <tbody>
            @foreach ($factures as $facture)


            <tr>
                    <td>
                        <div class="table-img">
                        <a href="#">
                        <label>{{ $facture->client->name }}</label>
                        </a>
                        </div>
                    </td>
                    <td>{{ $facture->montant }}</td>
                    <td>{{ $facture->client->clientcategorie->name }}</td>
                    <td>{{ $facture->month }}</td>
                    <td>{{ $facture->payed }}</td>
                    <td>
                        <a href="{{ route('factures.show', $facture->id) }}" class="action_label">Modifier</a>
                    </td>
                    <td>
                        <form action="{{ route('factures.destroy', $facture->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class=" btn rounded border bg-danger  shadow text-white" style="color: white!important">Supprimer</button>

                        </form>

                    </td>
            </tr>

            @endforeach


        </tbody>
        </table>
        </div>
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