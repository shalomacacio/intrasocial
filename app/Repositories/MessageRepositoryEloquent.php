<?php

namespace Intrasocial\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Intrasocial\Repositories\MessageRepository;
use Intrasocial\Entities\Message;
use Intrasocial\Validators\MessageValidator;
use DB;
use Auth;

/**
 * Class MessageRepositoryEloquent.
 *
 * @package namespace Intrasocial\Repositories;
 */
class MessageRepositoryEloquent extends BaseRepository implements MessageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Message::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MessageValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function distinctMessages(){
      $messages = Message::select('user_id','receiver_id')
      ->where('receiver_id','=' ,Auth::user()->id)
      ->distinct('user_id', 'receiver_id')
      ->get();
      return $messages;
    }

}
