<?php

namespace Intrasocial\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Intrasocial\Repositories\ComentRepository;
use Intrasocial\Entities\Coment;
use Intrasocial\Validators\ComentValidator;

/**
 * Class ComentRepositoryEloquent.
 *
 * @package namespace Intrasocial\Repositories;
 */
class ComentRepositoryEloquent extends BaseRepository implements ComentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Coment::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ComentValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
