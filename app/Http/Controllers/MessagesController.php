<?php

namespace Intrasocial\Http\Controllers;

use Intrasocial\Entities\Message;
use Illuminate\Http\Request;
use Intrasocial\Events\MessageSent;
use Auth;

use Intrasocial\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Intrasocial\Http\Requests\MessageCreateRequest;
use Intrasocial\Http\Requests\MessageUpdateRequest;
use Intrasocial\Repositories\MessageRepository;
use Intrasocial\Validators\MessageValidator;
use Log;

/**
 * Class MessagesController.
 *
 * @package namespace Intrasocial\Http\Controllers;
 */
class MessagesController extends Controller
{
    /**
     * @var MessageRepository
     */
    protected $repository;

    /**
     * @var MessageValidator
     */
    protected $validator;

    /**
     * MessagesController constructor.
     *
     * @param MessageRepository $repository
     * @param MessageValidator $validator
     */
    public function __construct(MessageRepository $repository, MessageValidator $validator)
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
        $messages = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $messages,
            ]);
        }

        return view('messages.index', compact('messages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MessageCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MessageCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            // broadcast(new MessageSent($request->get('message')))->toOthers();

            $message = $this->repository->create($request->all());

            $response = [
                'message' => 'Message created.',
                'data'    => $message->toArray(),
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
        $message = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $message,
            ]);
        }

        return view('messages.show', compact('message'));
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
        $message = $this->repository->find($id);

        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MessageUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MessageUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $message = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Message updated.',
                'data'    => $message->toArray(),
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
                'message' => 'Message deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Message deleted.');
    }



    //Metodos do pusher
    public function fetchMessages()
    {
      return Message::with('user')->get();
    }

    /**
 * Persist message to database
 *
 * @param  Request $request
 * @return Response
 */
    public function sendMessage(Request $request)
    {
      $message = $request->all();
      $json = json_encode($message);
      Log::debug($request);
      return response()->json($json);
    }
}
