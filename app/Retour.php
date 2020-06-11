<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retour extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'retours';

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
    protected $fillable = ['date', 'etat', 'vente_id'];

    public function vente()
    {
        return $this->belongsTo('App\Vente');
    }
    
}
