<?php

namespace Intrasocial\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Message.
 *
 * @package namespace Intrasocial\Entities;
 */
class Message extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
    [
      'message',
      'user_id',
      'receiver_id'

    ];


    public function user()
    {
      return $this->belongsTo('Intrasocial\Entities\User');
    }

}
