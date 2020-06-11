<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'achats';

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
    protected $fillable = ['date', 'etat', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function ligneachats()
    {
        return $this->hasMany('App\Ligneachat');
    }
    
}
