<?php

namespace Intrasocial\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 *
 * @package namespace Intrasocial\Repositories;
 */
interface UserRepository extends RepositoryInterface
{
  public function saveImage($img,$folder);
  public function deleteImage($name);
}
