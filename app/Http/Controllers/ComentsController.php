<?php

namespace Intrasocial\Http\Controllers;

use Illuminate\Http\Request;

use Intrasocial\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Intrasocial\Http\Requests\ComentCreateRequest;
use Intrasocial\Http\Requests\ComentUpdateRequest;
use Intrasocial\Repositories\ComentRepository;
use Intrasocial\Validators\ComentValidator;

/**
 * Class ComentsController.
 *
 * @package namespace Intrasocial\Http\Controllers;
 */
class ComentsController extends Controller
{
    /**
     * @var ComentRepository
     */
    protected $repository;

    /**
     * @var ComentValidator
     */
    protected $validator;

    /**
     * ComentsController constructor.
     *
     * @param ComentRepository $repository
     * @param ComentValidator $validator
     */
    public function __construct(ComentRepository $repository, ComentValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $coments = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $coments,
            ]);
        }

        return view('coments.index', compact('coments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ComentCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ComentCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $coment = $this->repository->create($request->all());

            $response = [
                'message' => 'Coment created.',
                'data'    => $coment->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coment = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $coment,
            ]);
        }

        return view('coments.show', compact('coment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coment = $this->repository->find($id);

        return view('coments.edit', compact('coment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ComentUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ComentUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $coment = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Coment updated.',
                'data'    => $coment->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Coment deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Coment deleted.');
    }
}
