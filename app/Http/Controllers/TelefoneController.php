<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    public function index(Request $request)
    {
        $tel = Telefone::orderBy('id', 'desc')->paginate(10); // Pega a tabela telefones e pagina
        $aluno_id = Telefone::pluck('aluno_id'); // pega o ID de todos os alunos
        $alunos = Aluno::whereIn('id', $aluno_id)->get(); // Verifica os alunos que possuem telefone cadastrado
        $nomes_alunos = $alunos->pluck('nome', 'id')->toArray(); // Pega noe de acordo com o ID


        return view('telefones.index', ['telefones' => $tel, 'nomes' => $nomes_alunos]);
    }

    public function create(Request $request)
    {
        $alunos = Aluno::pluck('id', 'nome')->toArray();
        return view('telefones.create', ['alunos' => $alunos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'numero' => 'required'
        ],);

        $telefone = new Telefone();
        $telefone->aluno_id = $request->aluno;
        $telefone->nome = $request->nome;
        $telefone->numero = $request->numero;
        $telefone->save();

        return redirect()->route('telefones.index');
    }

    public function edit(Request $request, $id)
    {
        $telefone = Telefone::findOrFail($id); // Acha o telefone para direcionar
        $alunoID = $telefone->aluno_id; // Pega o dono do telefone

        $alunos = Aluno::pluck('id', 'nome')->toArray(); // Pega o nome e id de todos os alunos para exibir na tela 

        $id = Aluno::where('id', $alunoID)->get(); // Pega o id correspondente do aluno do telefone
        $nome_telefone = $id->pluck('id', 'nome')->toArray(); // Informa o nome do aluno que ja está cadastrado


        return view('telefones.edit', ['telefone' => $telefone, 'alunos' => $alunos, 'nome_telefone' => $nome_telefone]);
    }

    public function update(Request $request, $id)
    {
        $livro = Telefone::findOrFail($id);
        $livro->aluno_id = $request->aluno;
        $livro->nome = $request->nome;
        $livro->numero = $request->numero;
        $livro->save();

        return redirect()->route('telefones.index');
    }

    public function delete(Request $request, $id)
    {
        $telefone = Telefone::findOrFail($id);
        $telefone->delete();

        return redirect()->route('telefones.index');
    }
}
