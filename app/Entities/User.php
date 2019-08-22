<?php

namespace Intrasocial\Entities;

use Artesaos\Defender\Traits\HasDefender;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User.
 *
 * @package namespace Intrasocial\Entities;
 */
class User extends Authenticatable
{
    use HasDefender;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
    [
      'name',
      'email',
      'img_path',
      'password',
    ];

    //MUTATORS
    // public function setImgPathAttribute($value){
    //   $this->attributes['img_path'] = $value->extension();
    // }

    public function getImgPathAttribute($value){
      if(is_object($value)){
        return $this->attributes['img_path'] = $value->extension();
      }
      return $value;
    }

    //funções auxiliares

    public function getFirstNameAttribute(){
      $firstname = explode(' ', trim($this->name))[0];
    }



    //CASTS E HIDDEN
    protected $hidden = [
      'password', 'remember_token',
    ];

    protected $casts = [
      'email_verified_at' => 'datetime',
    ];

    //RELATIONSHIPS
    public function posts()
    {
      return $this->harMany('Intrasocial\Entities\Post');
    }

    public function messages()
    {
      return $this->hasMany('Intrasocial\Entities\Message');
    }


}
