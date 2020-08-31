<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acce extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'acces';

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
    protected $fillable = ['table','action'];

    public function types()
    {
        return $this->belongsToMany('App\Type');
    }

}
