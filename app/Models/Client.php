<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'uid',
        'clientcategorie_id',
        'address',
        'phone',
    ];
    public function clientcategorie()
    {
        return $this->belongsTo(ClientCategorie::class, 'clientcategorie_id', 'id');
    }

    public function categories(){
        return ClientCategorie::all();
    }
}
