<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use App\Http\Requests\StoreForfaitRequest;
use App\Http\Requests\UpdateForfaitRequest;

class ForfaitController extends StandardController
{
    protected string $model = Forfait::class;
    protected $validator_classes = [
        "App\Http\Requests\StoreForfaitRequest",
        "App\Http\Requests\UpdateForfaitRequest",
    ];
    public function destroy(Forfait $object)
    {

       $object->first()->delete();
       return redirect()->back();
    }
}
