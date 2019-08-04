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
    protected $fillable = [
      'name', 'email', 'password',
    ];

    protected $hidden = [
      'password', 'remember_token',
    ];

    protected $casts = [
      'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
      return $this->harMany('Intrasocial\Entities\Post');
    }


}
