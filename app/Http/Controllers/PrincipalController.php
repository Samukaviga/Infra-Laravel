<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Exercicio;
use App\Models\Reuniao;
use App\Models\Evento;
use App\Models\Noticia;
use App\Models\Treino;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Storage;

class PrincipalController extends Controller
{

    public function index()
    {

        Carbon::setLocale('pt_BR');

        $reunioes = Reuniao::all();

        $eventos = Evento::all();

        $noticias = Noticia::all();

        $mensagemSucesso = session('mensagem.sucesso');

        return view('principal.index')->with('mensagemSucesso', $mensagemSucesso)
                                                ->with('reunioes', $reunioes)
                                                    ->with('noticias', $noticias)
                                                        ->with('eventos', $eventos);
    }

    public function perfil() 
    {
        $user = Auth::user();

        return view('principal.perfil')->with('user', $user);
    }

    public function perfilFoto(Request $request)
    {
       
        $validated = $request->validate([
            'imagem' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        

        if($user->imagem){

            Storage::disk('public')->delete($user->imagem); //excluindo imagem local, asyc
        
        }

        $coverPath = $request->hasFile('imagem') ? $request->file('imagem')->store('assets/perfil', 'public') : $coverPath = null; //armazena em um lugar permanente. O Laravel cria uma pasta com o nome 'series_cover' e retorna o caminho salvo e salva em public (config/filesystems)

        $request->coverPath = $coverPath;

        $user->imagem = $request->coverPath;
        $user->save();

        return back()->with('mensagemSucesso', "Foto de perfil atualizada com sucesso!");
   
    }

    public function alterarSenha() 
    {
        return view('principal.alterarSenha');
    }

    public function adicionarEvento()
    {
        return view('principal.adicionar-evento');
    }

    public function adicionarEventoPost(Request $request)
    {
        

        $validated = $request->validate([
            'nome' => 'required',
            'data' => 'required',
            'horario' => 'required',
        ]);


        $reuniao = Evento::create([
            'nome' => $request->nome,
            'data' => $request->data,
            'horario' => $request->horario,
          
        ]);

        return view('principal.adicionar-evento')->with('mensagemSucesso', "Evento adicionado com sucesso!");
    }

    public function adicionarReuniao()
    {
        $mensagemSucesso = session('mensagem.sucesso');

        return view('principal.adicionar-reuniao')->with('mensagemSucesso', $mensagemSucesso);
    }

    public function adicionarReuniaoPost(Request $request)
    {
    
        $validated = $request->validate([
            'nome' => 'required',
            'data' => 'required',
            'horario' => 'required',
        ]);

        $reuniao = Reuniao::create([
            'nome' => $request->nome,
            'data' => $request->data,
            'horario' => $request->horario,
          
        ]);

      return to_route('principal')->with('mensagemSucesso', "Reuniao adicionada com sucesso!");
   
    }

    public function adicionarNoticia()
    {
        return view('principal.adicionar-noticia');
    }

    public function adicionarNoticiaPost(Request $request)
    {

        $validated = $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);


        $reuniao = Noticia::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
        ]);

        return view('principal.adicionar-noticia')->with('mensagemSucesso', "Noticia adicionada com sucesso!");
    }

    //BLOG
    public function blog()
    {
        $mensagemSucesso = session('mensagem.sucesso');

        Carbon::setLocale('pt_BR');

        $blogs = Blog::all();

        return view('blog.index')->with('blogs', $blogs)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function blogDetalhes(Request $request) 
    {

        $blog = Blog::where('id', $request->id)->first();


        return view('blog.detalhes')->with('blog', $blog);

    }

    public function blogEditar() 
    {
        return view('blog.editar');
    }

    public function blogNovo() 
    {
        return view('blog.novo');
    }

    public function blogNovoPost(Request $request) 
    {


        $validated = $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);

        $coverPath = $request->hasFile('imagem') ? $request->file('imagem')->store('assets/blog', 'public') : $coverPath = null; //armazena em um lugar permanente. O Laravel cria uma pasta com o nome 'series_cover' e retorna o caminho salvo e salva em public (config/filesystems)

        $request->coverPath = $coverPath;

        $blog = Blog::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'imagem' => $request->coverPath,
            'id_user' => $request->id_user,
        ]);

        return view('blog.novo')->with('mensagemSucesso', "Blog adicionado com sucesso!");
   
    }

    public function blogDeletar(Request $request) 
    {
        $blogs = Blog::all();

        $blog = Blog::find($request->id);

        $blog->imagem ? Storage::disk('public')->delete($blog->imagem) : null; //excluindo imagem local, asyc

        Blog::destroy($request->id);

        return back()->with('mensagemSucesso', "Blog deletado com sucesso");

    }

    // RECURSOS HUMANOS
    public function recursosHumanos()
    {
        return view('recursos-humanos.index');
    }

    public function recursosHumanosDetalhes()
    {
        return view('recursos-humanos.detalhes');
    }

    public function recursosHumanosEditar()
    {
        return view('recursos-humanos.editar');
    }

    public function recursosHumanosNovo()
    {
        return view('recursos-humanos.novo');
    }















    public function dadosAluno(int $id)
    {
        $aluno = User::find($id);

        $aluno->data_nascimento = date_format(Carbon::parse($aluno->data_nascimento), 'd/m/Y');
        $aluno->data_inicio = date_format(Carbon::parse($aluno->data_inicio), 'd/m/Y');
        $aluno->data_troca = date_format(Carbon::parse($aluno->data_troca), 'd/m/Y');


        return view('professor.dadosAluno')->with('aluno', $aluno);
    }

    public function treinoAluno(int $id, string $tipo)
    {
        $mensagemSucesso = session('mensagem.sucesso');

        return view('professor.treinoAluno')->with('tipo', $tipo)
            ->with('id', $id)
            ->with('mensagemSucesso', $mensagemSucesso)
            ->with('aluno', User::find($id));
    }

    public function inserindoTreinoALuno(Request $request)
    {
        $validated = $request->validate([
            'agrupamento' => 'required',
            'exercicio' => 'required',
            'serie' => 'required',
        ]);


        $treino = Treino::create([
            'serie' => $request->serie,
            'tipo' => $request->tipo,
            'id_exercicio' => $request->exercicio,
            'id_user' => $request->id,
            'obs' => $request->obs,
            'concluido' => false
        ]);

        $nomeExercicio = $treino->exercicio->nome;

        return to_route('treinoAluno', ['id' => $request->id, 'tipo' => $request->tipo])->with('mensagem.sucesso', "Treino de $nomeExercicio adicionado");
    }

    public function deletarTreino(int $id_exercicio, Request $request)
    {

        Treino::destroy($id_exercicio);

        return to_route('treinoAluno', ['id' => $request->id, 'tipo' => $request->tipo])->with('mensagemSucesso', "Treino excluido com sucesso!");
    }

    public function adicionarExercicio()
    {

        $mensagemSucesso = session('mensagem.sucesso');

        return view('professor.adicionarExercicio')->with('mensagemSucesso', $mensagemSucesso);
    }

    public function adicionarExercicioPost(Request $request)
    {

        $validated = $request->validate([
            'agrupamento' => 'required',
            'nome' => 'required',
            'imagem' => 'required',
        ]);

        $coverPath = $request->hasFile('imagem') ? $request->file('imagem')->store('assets/gifs', 'public') : $coverPath = null; //armazena em um lugar permanente. O Laravel cria uma pasta com o nome 'series_cover' e retorna o caminho salvo e salva em public (config/filesystems)

        $request->coverPath = $coverPath;

        $exercicio = Exercicio::create([
            'agrupamento' => $request->agrupamento,
            'nome' => $request->nome,
            'imagem' => $request->coverPath,
        ]);

        return redirect('/professor/exercicio')->with('mensagem.sucesso', "Exercicio $request->nome adicionado");
    }

    public function gif(int $treino_id)
    {

        $treino = Treino::find($treino_id);

        $mensagemSucesso = session('mensagem.sucesso');

        return view('professor.gif')->with('treino', $treino)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function editarDadosExercicio(int $id_treino)
    {
        $treino = Treino::find($id_treino);

        $mensagemSucesso = session('mensagem.sucesso');

        return view('professor.editarDadosExercicio')->with('treino', $treino)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function editarDadosExercicioPost(Request $request)
    {

        $treino = Treino::find($request->id_treino);
        $treino->fill($request->all());
        $treino->save();


        return to_route('gif', ['id_treino' => $treino->id])
            ->with('mensagem.sucesso', "Treino atualizado com sucesso");
    }

    public function editarAluno(int $id)
    {
        $aluno = User::find($id);

        return view('professor.editarAluno')->with('aluno', $aluno);
    }

    public function editarAlunoPost(Request $request)
    {
        $user = User::find($request->id_aluno);
        $user->fill($request->all());
        $user->save();

        return to_route('professor')
            ->with('mensagem.sucesso', "Dados do aluno atualizado com sucesso");
    }

    public function pesquisar(User $alunos, Request $request)
    {

        $mensagemSucesso = session('mensagem.sucesso');

        $aluno = $alunos::where('name', 'LIKE', "%{$request->nome}%")->where('tipo_usuario', 0)->get();

        return view('professor.index')->with('alunos', $aluno)
            ->with('paginate', $paginate = false)
            ->with('mensagemSucesso', $mensagemSucesso);
    }
}
