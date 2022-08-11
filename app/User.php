<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable , HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','tel','country','city','sexe','birthday','code_postal'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function hasAnyRoles($roles)
    {
        if($this->roles()->whereIn('name',$roles)->first()){
            return true;
        }
        return false;
    }

    public function hasRole($role)
    {
        if($this->roles()->where('name' , $role)->first()){
            return true;
        }
        return false;
    }

    public function products(){
        return $this->belongsTo('App\Product');
    }

    protected $appends = ['avatar'];

    public function getAvatarAttribute()
    {
        return "http://www.getavatar.com.avatar/".md5(strtolower(trim($this->email)));
    }
}

