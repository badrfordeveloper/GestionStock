<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ventes';

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
    protected $fillable = ['date', 'etat', 'commande_id'];

    public function commande()
    {
        return $this->belongsTo('App\Commande');
    }
    public function retours()
    {
        return $this->hasMany('App\Retour');
    }
    
}
