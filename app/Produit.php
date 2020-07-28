<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'produits';

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
    protected $fillable = ['nom', 'description', 'image', 'prix', 'quantite', 'categorie_id'];

    public function categorie()
    {
        return $this->belongsTo('App\Category');
    }
    public function lignecommandes()
    {
        return $this->hasMany('App\Lignecommande');
    }
    public function ligneachats()
    {
        return $this->hasMany('App\Ligneachat');
    }

    public function commandes()
    {
        return $this->belongsToMany('App\Commande');
    }
    
}
