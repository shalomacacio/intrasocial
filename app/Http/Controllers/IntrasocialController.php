<?php

namespace Intrasocial\Http\Controllers;
use Intrasocial\Repositories\PostRepository;

use Illuminate\Http\Request;

class IntrasocialController extends Controller
{

  /**
    * @var PostRepository
  */
    protected $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $posts = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $posts,
            ]);
        }

        return view('intrasocial.index', compact('posts'));
    }

}
