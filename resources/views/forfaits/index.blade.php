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
    <li class="breadcrumb-item active"> Forfaits</li>
    </ul>
</div>
    <div>

    </div>

    <div class="accordion col-xl-12 col-sm-12 col-12 pb-3" id="mon-accordeon">

        <div class="accordion-item">
          <h2 class="accordion-header" id="heading">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="true" aria-controls="collapse">
                <h3>Ajouter  un forfait</h3>
            </button>
          </h2>
          <div id="collapse" class="accordion-collapse collapse " aria-labelledby="heading" data-bs-parent="#mon-accordeon">
            <div class="accordion-body">
                <div class="col-xl-12 col-sm-12 col-12 ">
                    <div class="card">
                            <div class="card-header">
                                    <h2 class="card-titles">Ajouter un forfait</h2>
                            </div>
                            <form action="{{ route('forfaits.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                        <div class="row">
                                                    <div class="col-xl-6 col-sm-12 col-12 ">
                                                        <div class="form-group">
                                                            <input type="text" name="montant" placeholder="montant du forfaits" required>
                                                        </div>
                                                    </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-sm-12 col-12 pt-3 pb-2">
                                                <label for="exampleFormControlInput1" style="font-weight: 700">Categorie</label>
                                            <div class="form-group">
                                            <select name="clientcategorie_id" id="" class="form-control">
                                                @foreach (App\Models\ClientCategorie::all() as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>

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

      </div>
    </div>



    <div class="col-xl-12 col-sm-12 col-12 mb-4">
        <div class="card">
                <div class="table-heading">
                <h2>Forfaits</h2>
                </div>
        <div class="table-responsive">
        <table class="table  custom-table no-footer">
            <thead>
                <tr>
                        <th>categorie clients</th>
                        <th>montant</th>
                        <th>--</th>
                        <th>--</th>


                </tr>
            </thead>
        <tbody>
            @foreach ($forfaits as $forfait)


            <tr>
                    <td>
                        <div class="table-img">
                        <a href="#">
                        <label>{{ $forfait->clientcategorie->name??'' }}</label>
                        </a>
                        </div>
                    </td>
                    <td>{{ $forfait->montant }}</td>
                    <td>
                        <a href="{{ route('forfaits.show', $forfait->id) }}" class="action_label">Modifier</a>
                    </td>
                    <td>
                        <form action="{{ route('forfaits.destroy', $forfait->id) }}" method="post">
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