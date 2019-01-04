<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class LoginController extends Controller
{

    protected $redirectTo = '/login';

    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {

        $rules = [
            'usuario' => 'required|email',
            'senha' => 'required',
        ];

        $messages = [
            'required' => '<span class="text-danger"><i class="fa fa-times-circle-o"></i> Este campo é obrigatório</span>',
            'email' => '<span class="text-danger"><i class="fa fa-times-circle-o"></i> Digite um e-mail válido</span>',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();

        } else {

            $credentials = [
                'email' => $request->input('usuario'),
                'password' => $request->input('senha'),
                'ativo' => true,

            ];


            if (Auth::attempt($credentials)) {

                return redirect(route('cursos.index'));
            } else {

                return redirect()->back()
                    ->with('mensagem', '<div class="alert alert-danger alert-dismissable"><i class="fa fa-check"></i>
                                        <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>Usuário ou senha inválidos!!</div>');
            }

        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));

    }

}
