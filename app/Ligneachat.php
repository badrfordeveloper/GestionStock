<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ligneachat extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ligneachats';

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
    protected $fillable = ['produit_id', 'achat_id', 'quantite', 'prix_unite'];

    public function produit()
    {
        return $this->belongsTo('App\Produit');
    }
    public function achat()
    {
        return $this->belongsTo('App\Achat');
    }
    
}
