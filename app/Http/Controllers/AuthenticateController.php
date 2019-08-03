<?php

namespace Intrasocial\Http\Controllers;

use Illuminate\Http\Request;
use Intrasocial\Validators\UserValidator;
use Intrasocial\Repositories\UserRepository;
use Auth;

class AuthenticateController extends Controller
{
    protected $repository;
    protected $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function login(){
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function intrasocial()
    {
        return view('intrasocial.index');
    }

    public function auth(Request $request)
    {
        $data = [
            'email'=> $request->get('email'),
            'password' => $request->get('password')
        ];

        try
          {
            if(env('PASSWORD_HASH')){
                Auth::attempt($data, false);
          }else{
                $user = $this->repository->findWhere(['email'=>$request->get('email') ])->first();

                if(!$user){
                    throw new Exception("Email inválido");
                }

                if($user->password != $request->get('password')){
                    throw new Exception("Senha inválida");
                }

                Auth::login($user);
                return redirect()->route('intrasocial');
          }
        } catch(\Throwable $th){
          //throw $th;
          echo ('erro');
          return dd($th);
        }
    }

}
