<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class AdminController extends Controller
{
    public function loja() {
        $produtos = Produto::orderBy('data_lancamento', 'DESC')->get();
        
        foreach($produtos as $produto)
            $produto->data_formatada = \Carbon\Carbon::parse($produto->data_lancamento)->format('d/m/Y');

        return view('admin/loja', ['produtos' => $produtos]);
    }

    public function adicionar() {
        return view('admin/adicionar');
    }

    public function inserir(Request $request) {
        Produto::create($request->all());
        return redirect()->route('admin.loja');
    }

    public function editar(Produto $produto) {
        return view('admin/editar', ['produto' => $produto]);
    }

    public function deletar(Produto $produto) {
        $produto->delete();
        return redirect()->route('admin.loja');
    }

    public function salvar(Request $request, Produto $produto) {

        $produto->update([
            'nome' => $request->nome,
            'data_lancamento' => $request->data_lancamento,
            'tem_demo' => $request->tem_demo,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade
        ]);

        return redirect()->route('admin.loja');
    }
}
