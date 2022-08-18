<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    protected $fillable = [
        'taille'
    ];
    public function photos(){
        return $this->belongsTo('App\Photo');
    }
}
