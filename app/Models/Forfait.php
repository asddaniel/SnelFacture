<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Forfait extends Model
{
    use HasFactory;
    protected $fillable = [
        'montant',
        'clientcategorie_id',
    ];

    /**
     * Get the clientcategorie associated with the Forfait
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function clientcategorie(): HasOne
    {
        return $this->hasOne(ClientCategorie::class, 'id', 'clientcategorie_id');
    }
}
