<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Emprestimo;
use App\Models\Livro;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function index(Request $request)
    {
        $emp = Emprestimo::orderBy('updated_at', 'desc')->paginate(10); // Pega a tabela telefones e pagina

        $livro_id = Emprestimo::pluck('livro_id'); // pega o ID de todos os livros
        $livros = Livro::whereIn('id', $livro_id)->get(); // Verifica os livros que possuem emprestimo cadastrado
        $nomes_livros = $livros->pluck('nome', 'id')->toArray(); // Pega nome de acordo com o ID

        $aluno_id = Emprestimo::pluck('aluno_id'); // pega o ID de todos os alunos
        $alunos = Aluno::whereIn('id', $aluno_id)->get(); // Verifica os alunos que possuem emprestimo cadastrado
        $nomes_alunos = $alunos->pluck('nome', 'id')->toArray(); // Pega nome de acordo com o ID


        return view('emprestimos.index', ['emprestimos' => $emp, 'alunos' => $nomes_alunos, 'livros' => $nomes_livros]);
    }

    public function create(Request $request)
    {
        $alunos = Aluno::pluck('id', 'nome')->toArray();
        $livros = Livro::pluck('id', 'nome')->toArray();

        return view('emprestimos.create', ['alunos' => $alunos, 'livros' => $livros]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'aluno' => 'required',
            'livro' => 'required',
            'entrada' => 'required'
        ],);

        $emprestimo = new Emprestimo();
        $emprestimo->aluno_id = $request->aluno;
        $emprestimo->livro_id = $request->livro;
        $emprestimo->datahora = $request->entrada;
        $emprestimo->data_devolucao = $request->saida;
        $emprestimo->save();

        return redirect()->route('emprestimos.index');
    }

    public function edit(Request $request, $aluno_id, $livro_id, $datahora)
    {
        $emprestimo = Emprestimo::where('aluno_id', $aluno_id)
            ->where('livro_id', $livro_id)
            ->where('datahora', $datahora)
            ->first(); // Seleciona o emprestimo que é falado

        if ($emprestimo) {
            $alunos = Aluno::pluck('id', 'nome')->toArray(); // Pega a lista de todos os alunos

            $alunoID = $emprestimo->aluno_id; // Busca o nome do aluno que possui o emprestimo
            $id = Aluno::where('id', $alunoID)->get();
            $aluno_emprestimo = $id->pluck('id', 'nome')->toArray();

            $livros = Livro::pluck('id', 'nome')->toArray(); // Pega a lista de todos os livros

            $livroID = $emprestimo->livro_id; // Busca o nome do aluno que possui o emprestimo
            $id = Livro::where('id', $livroID)->get();
            $livro_emprestimo = $id->pluck('id', 'nome')->toArray();

            return view('emprestimos.edit', [
                'emprestimo' => $emprestimo, 'alunos' => $alunos, 'livros' => $livros,
                'aluno_emprestimo' => $aluno_emprestimo, 'livro_emprestimo' => $livro_emprestimo,
            ]);
        } else {
            return view('emprestimos.index');
        }
    }

    public function update(Request $request, $aluno_id, $livro_id, $datahora)
    {
        Emprestimo::where('aluno_id', $aluno_id)
            ->where('livro_id', $livro_id)
            ->where('datahora', $datahora)
            ->update([
                'aluno_id' => $request->aluno,
                'livro_id' => $request->livro,
                'datahora' => $request->entrada,
                'data_devolucao' => $request->saida
            ]);

        return redirect()->route('emprestimos.index');
    }

    public function delete(Request $request, $aluno_id, $livro_id, $datahora)
    {
        Emprestimo::where('aluno_id', $aluno_id)
            ->where('livro_id', $livro_id)
            ->where('datahora', $datahora)
            ->delete();

        return redirect()->route('emprestimos.index');
    }
}
