<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends StandardController
{
    protected string $model = Client::class;
    protected $validator_classes = [
        "App\Http\Requests\StoreClientRequest",
        "App\Http\Requests\UpdateClientRequest"
    ];
    public function destroy(Client $object)
    {

       $object->first()->delete();
       return redirect()->back();
    }
}
