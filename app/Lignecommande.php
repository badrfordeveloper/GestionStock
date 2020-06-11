<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lignecommande extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lignecommandes';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['produit_id', 'commande_id', 'quantite', 'prix_unite'];

    public function produit()
    {
        return $this->belongsTo('App\Produit');
    }
    public function commande()
    {
        return $this->belongsTo('App\Commande');
    }
    
}
