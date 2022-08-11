<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    protected $fillable = [
        'taille'
    ];
    public function photos(){
        return $this->belongsTo('App\Photo');
    }
}
