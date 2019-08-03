<?php

namespace Intrasocial\Transformers;

use League\Fractal\TransformerAbstract;
use Intrasocial\Entities\Post;

/**
 * Class PostTransformer.
 *
 * @package namespace Intrasocial\Transformers;
 */
class PostTransformer extends TransformerAbstract
{
    /**
     * Transform the Post entity.
     *
     * @param \Intrasocial\Entities\Post $model
     *
     * @return array
     */
    public function transform(Post $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
