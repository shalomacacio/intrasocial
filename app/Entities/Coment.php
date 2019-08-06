<?php

namespace Intrasocial\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Support\Carbon;
/**
 * Class Coment.
 *
 * @package namespace Intrasocial\Entities;
 */
class Coment extends Model implements Transformable
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
      'post_id',
      'description',
      'created_at'
    ];

    public function getTempoAttribute()
    {
        $dataFinal = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at );
        $tempo = $dataFinal->diffInDays(Carbon::now());
        if($tempo <= 0){
            $tempo = $dataFinal->diffInHours(Carbon::now());
            return "há:".$tempo." horas";
        }
        return "há:".$tempo." dias";
    }

    public function user(){
      return $this->belongsTo('Intrasocial\Entities\User');
    }

    public function post(){
      return $this->belongsTo('Intrasocial\Entities\Post');
    }

}
