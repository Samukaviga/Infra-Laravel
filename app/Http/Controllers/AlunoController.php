<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Treino;
use Illuminate\Http\Request;


class AlunoController extends Controller
{


    public function index()
    {
        $mensagemSucesso = session('mensagem.sucesso');

        return view('alunos.index')->with('mensagemSucesso', $mensagemSucesso);
    }

    public function treino(Request $request)
    {

        $treinos = Treino::where('id_user', $request->id)->where('tipo', $request->tipo)->get();

        $mensagemSucesso = session('mensagem.sucesso');

        return view('alunos.treino')->with('tipo', $request->tipo)
                                            ->with('treinos', $treinos)
                                                ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function concluirTreino(Request $request)
    {

        $treinos = Treino::where('id_user', $request->id)->where('tipo', $request->tipo)->update(['concluido' => 0]);

        return to_route('aluno')->with('mensagemSucesso', "Treino concluido com sucesso!");
    }

    public function gif(Request $request)
    {

        $treino = Treino::find($request->id_treino);

        return view('alunos.gif')->with('treino', $treino);
    }

    public function edit(Request $request)
    {
        $aluno = User::find($request->id);

        $mensagemSucesso = session('mensagem.sucesso');

        return view('alunos.edit')->with('aluno', $aluno)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function atualizandoDadosAluno(Request $request)
    {


        $user = User::find($request->id);
        $user->fill($request->all());
        $user->save();

        return to_route('aluno.editar', ['id' => $user->id])
            ->with('mensagem.sucesso', "Seus dados foram atualizados com sucesso!");
    }

    public function alterarSenha()
    {
        return view('alunos.alterarSenha');
    }
}
