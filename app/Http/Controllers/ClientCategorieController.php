<?php

namespace App\Http\Controllers;

use App\Models\ClientCategorie;
use App\Http\Requests\StoreClientCategorieRequest;
use App\Http\Requests\UpdateClientCategorieRequest;

class ClientCategorieController extends StandardController
{
    protected string $model = 'App\Models\ClientCategorie';
    protected $validator_classes = [
        "App\Http\Requests\StoreClientCategorieRequest",
        "App\Http\Requests\UpdateClientCategorieRequest"
    ];

    public function destroy(ClientCategorie $object)
    {
         
       $object->first()->delete();
       return redirect()->back();
    }

}
