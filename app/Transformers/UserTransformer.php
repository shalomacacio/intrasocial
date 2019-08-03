<?php

namespace Intrasocial\Transformers;

use League\Fractal\TransformerAbstract;
use Intrasocial\Entities\User;

/**
 * Class UserTransformer.
 *
 * @package namespace Intrasocial\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    /**
     * Transform the User entity.
     *
     * @param \Intrasocial\Entities\User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
