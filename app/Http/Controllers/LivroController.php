<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{

    public function index(Request $request)
    {
        return view('livros.index', ['livros' => Livro::orderBy('id', 'desc')->paginate(20)]);
    }

    public function create(Request $request)
    {
        return view('livros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'autor' => 'required'
        ],);

        $livro = new Livro();
        $livro->nome = $request->nome;
        $livro->autor = $request->autor;
        $livro->isbn = $request->isbn;
        $livro->save();

        return redirect()->route('livros.index');
    }

    public function edit(Request $request, $id)
    {
        $livro = Livro::findOrFail($id);
        return view('livros.edit', ['livro' => $livro]);
    }

    public function update(Request $request, $id)
    {
        $livro = Livro::findOrFail($id);
        $livro->nome = $request->nome;
        $livro->autor = $request->autor;
        $livro->isbn = $request->isbn;
        $livro->save();

        return redirect()->route('livros.index');
    }

    public function delete(Request $request, $id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();

        return redirect()->route('livros.index');
    }
}
