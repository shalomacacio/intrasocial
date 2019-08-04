<?php

namespace Intrasocial\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


/**
 * Class Post.
 *
 * @package namespace Intrasocial\Entities;
 */
class Post extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
    [
      'user_id',
      'setor_id',
      'img',
      'description',
    ];

    public function user(){
      return $this->belongsTo('Intrasocial\Entities\User');
    }

}
