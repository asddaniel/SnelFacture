<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'month',
        'client_id',
        'forfait_id',
        'payed',
        'montant'
    ];
    /**
     * Get the client associated with the Facture
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function client(): HasOne
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }
    /**
     * Get the categorie associated with the Facture
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function clientcategorie(): HasOne
    {
        return $this->hasOne(ClientCategorie::class, 'id', 'clientcategorie_id');
    }
}
