<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';


    protected $fillable = [
        'name'
    ];

    public function product()
    {
      return $this->belongsTo('App\Product', 'id');
    }
    public function sizes(){
        return $this->belongsToMany('App\Sizes', 'photo_sizes', 'photo_id', 'size_id')
        ->withPivot(['qte']);
    }
}

