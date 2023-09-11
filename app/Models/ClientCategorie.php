<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ClientCategorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    /**
     * Get the forfait associated with the ClientCategorie
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function forfait(): HasOne
    {
        return $this->hasOne(Forfait::class, 'clientcategorie_id', 'id');
    }
}
