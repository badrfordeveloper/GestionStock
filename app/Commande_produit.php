<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande_produit extends Model
{
	    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'commande_produit';

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
    
    protected $fillable = ['quantite', 'prix_unite', 'produit_id', 'commande_id'];

/*    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function lignecommandes()
    {
        return $this->hasMany('App\Lignecommande');
    }
    public function ventes()
    {
        return $this->hasMany('App\Vente');
    }

     public function Produits()
    {
        return $this->belongsToMany('App\Produit');
    }*/
}
