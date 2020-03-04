<?php

namespace App\Http\Controllers;

use App\Mail\ResetaPassword;
use App\User;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Mail;

class SenhaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getFormEsqueciSenha()
    {
        return view('senha.esqueci');
    }

    public function resetaSenha(HttpRequest $request){
        $user = User::whereEmail($request->email)->first();

        if($user == null){
            return redirect()->back()->with(['error' => 'O e-mail não foi encontrado.']);
        }

        $this->enviaEmailRecuperacaoDeSenha($user);

        return redirect()->back()->with(['success' => 'O e-mail para alteração da senha foi enviado.']);
    }

    public function enviaEmailRecuperacaoDeSenha($user): void
    {
        Mail::send(new ResetaPassword($user));
    }
}



