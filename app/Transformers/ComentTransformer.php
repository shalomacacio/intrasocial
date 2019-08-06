<?php

namespace Intrasocial\Transformers;

use League\Fractal\TransformerAbstract;
use Intrasocial\Entities\Coment;

/**
 * Class ComentTransformer.
 *
 * @package namespace Intrasocial\Transformers;
 */
class ComentTransformer extends TransformerAbstract
{
    /**
     * Transform the Coment entity.
     *
     * @param \Intrasocial\Entities\Coment $model
     *
     * @return array
     */
    public function transform(Coment $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
