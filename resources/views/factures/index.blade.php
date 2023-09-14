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
                <div class="row pt-2">

                <form name="filtre" class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <select name="selected_status" id="" class="px-2">
                                <option value="all">all</option>
                                <option value="pending">non payer</option>
                                <option value="paid">payer</option>
                            </select>
                            <div class="pt-3">
                <button class="btn btn-primary text-white p-2 fw-bold ">Filtrer</button>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="date">Entre</label>
                            <input type="date" name="debut" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="datefin">Et</label>
                            <input type="date" name="fin" class="form-control" id="" required>
                        </div>
                    </div>


                </form>

                </div>
                </div>
        <div class="table-responsive">
        <table class="table  custom-table no-footer">
            <thead>
                <tr>
                        <th>clients</th>
                        <th>uid clients</th>
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


            <tr class="table-row {{ $facture->payed==1 ? 'bg-success text-white' : '' }}" data-fact="{{ json_encode($facture) }}">
                    <td>
                        <div class="table-img">
                        <a href="#">
                        <label>{{ $facture->client->name??'' }}</label>
                        </a>
                        </div>
                    </td>
                    <td class="text-uppercase">{{ $facture->client->uid??'' }}</td>
                    <td>{{ $facture->montant }}</td>
                    <td>{{ $facture->client->clientcategorie->name??'' }}</td>
                    <td>{{ substr($facture->month, 0, 7) }}</td>
                    @if ($facture->payed==1)
                    <td class=" fw-bold"> Payé </td>
                    @else
                       <td class="d-flex">
                        <form action="{{ route('factures.pay', $facture->id) }}" method="post">
                            @csrf
                            <button class="btn btn-success p-2 text-white fw-bold">Payer</button>
                        </form>
                       </td>
                    @endif

                    <td>

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
        document.filtre.addEventListener('submit', function(e){
            e.preventDefault();
            const status = document.filtre.selected_status.value;
            const start = document.filtre.debut.value;
            const end = document.filtre.fin.value;
            const all = document.querySelectorAll('.table-row');

            all.forEach(element => {
                const data = JSON.parse(element.getAttribute('data-fact'));

              if((new Date(data.month))>=(new Date(start)) && (new Date(data.month))< (new Date(end))){
                if((data.payed===1) == (status==='paid')) {
                   element.classList.remove('hide');
                   console.log(data)
                }else{

                    element.classList.add('hide')
                }
              }
            });

        })
    </script>
    @endsection