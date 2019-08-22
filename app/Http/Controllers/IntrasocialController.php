<?php

namespace Intrasocial\Http\Controllers;
use Intrasocial\Repositories\PostRepository;
use Intrasocial\Repositories\MessageRepository;
use Illuminate\Http\Request;
use Auth;

class IntrasocialController extends Controller
{

  /**
    * @var PostRepository
  */
    protected $postrepository;
    protected $msgrepository;

    public function __construct(PostRepository $postrepository, MessageRepository $msgrepository)
    {
        $this->postrepository = $postrepository;
        $this->msgrepository = $msgrepository;
    }

    public function index()
    {
        $this->postrepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $posts = $this->postrepository->orderBy('created_at','desc')->all();

        $messages = $this->msgrepository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $messages = $this->msgrepository->distinctMessages();

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $posts,
            ]);
        }

        return view('intrasocial.index', compact('posts', 'messages'));
    }

}
