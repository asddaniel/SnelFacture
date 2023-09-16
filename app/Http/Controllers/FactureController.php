<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Client;
use App\Http\Requests\StoreFactureRequest;
use App\Http\Requests\AddFactureRequest;

class FactureController extends StandardController
{
    protected string $model = Facture::class;
    protected $validator_classes = [
        "App\Http\Requests\StoreFactureRequest",
        "App\Http\Requests\UpdateFactureRequest"
    ];

    protected $invokable = [
        "facture/add"=>["method"=>"post", "call"=>"create_facture", 'name'=>'add_facture'],
        "facture/payer/{facture}"=>["method"=>"post", "call"=>"payer_facture", 'name'=>'factures.pay'],
    ];

    public function create_facture(AddFactureRequest $request){
        $data = $request->validated();
        $clients = Client::all();
        $month = explode('-', $data['month']);
        $month = $data['month'].'-01';

        foreach ($clients as $client) {
            Facture::create(["client_id"=>$client->id,
            "forfait_id"=>$client->clientcategorie->forfait->id??0,
            "month"=>$month,
            "montant"=>$client->clientcategorie->forfait->montant??0,
        ]);
        }
        return redirect()->back();
    }

    public function payer_facture(Facture $facture){
        $facture->payed = 1;
        $facture->save();
        return redirect()->back();
    }

    public function destroy(Facture $object)
    {

       $object->first()->delete();
       return redirect()->back();
    }
}
