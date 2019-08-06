<?php

namespace Intrasocial\Presenters;

use Intrasocial\Transformers\ComentTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ComentPresenter.
 *
 * @package namespace Intrasocial\Presenters;
 */
class ComentPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ComentTransformer();
    }
}
