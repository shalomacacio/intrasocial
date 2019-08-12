<?php

namespace Intrasocial\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PostRepository.
 *
 * @package namespace Intrasocial\Repositories;
 */
interface PostRepository extends RepositoryInterface
{
    public function saveImage($img, $name);
    public function deleteImage($name);
}
