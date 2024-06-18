<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class UsuarioController extends Controller
{
    public function loja() {
        $produtos = Produto::orderBy('data_lancamento', 'DESC')->get();
        
        foreach($produtos as $produto)
            $produto->data_formatada = \Carbon\Carbon::parse($produto->data_lancamento)->format('d/m/Y');

        return view('usuario.loja', ['produtos' => $produtos]);
    }
}
