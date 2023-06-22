<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Emprestimo;
use App\Models\Telefone;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index(Request $request)
    {
        return view('alunos.index', ['alunos' => Aluno::orderBy('id', 'desc')->paginate(10)]);
    }

    public function create(Request $request)
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        //return $request->all();

        $obj            = new Aluno();
        $obj->nome      = $request->nome;
        $obj->matricula = $request->matricula;
        $obj->endereco  = $request->endereco;
        $obj->save();

        return redirect()->route('alunos.index');
    }

    public function edit(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit', ['aluno' => $aluno]);
    }

    public function update(Request $request, $id)
    {

        $obj            = Aluno::findOrFail($id);
        $obj->nome      = $request->nome;
        $obj->matricula = $request->matricula;
        $obj->endereco  = $request->endereco;
        $obj->save();

        return redirect()->route('alunos.index');
    }

    public function delete(Request $request, $id)
    {
        $telefones = Telefone::where('aluno_id', $id)->get();
        foreach ($telefones as $telefone) {
            $telefone->delete();
        }

        $emprestimos = Emprestimo::where('aluno_id', $id)->whereRaw('1 = 1')->delete();


        $obj = Aluno::findOrFail($id);
        $obj->delete();



        return redirect()->route('alunos.index');
    }
}
