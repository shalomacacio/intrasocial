<?php

namespace Intrasocial\Transformers;

use League\Fractal\TransformerAbstract;
use Intrasocial\Entities\Message;

/**
 * Class MessageTransformer.
 *
 * @package namespace Intrasocial\Transformers;
 */
class MessageTransformer extends TransformerAbstract
{
    /**
     * Transform the Message entity.
     *
     * @param \Intrasocial\Entities\Message $model
     *
     * @return array
     */
    public function transform(Message $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
