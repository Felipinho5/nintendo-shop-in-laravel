@extends('layouts/base')
@section('titulo', 'Loja Nintendo')
@section('links-extra')
<link rel="stylesheet" href="{{ asset('css/loja.css') }}">
<link rel="stylesheet" href="{{ asset('css/editar.css') }}">
@endsection

@section('conteudo')

<main>

<div class="album py-5 bg-body-tertiary">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    <div class="col jogo">
        <div class="card shadow-sm">
        <img class="bd-placeholder-img card-img-top" width="100%" src="{{ asset('images/' . $produto->imagem . '.avif') }}">
        <form action="{{ route('admin.salvar', ['produto' => $produto->id]) }}" method="POST" class="card-body">
            @csrf()
            @method('PUT')
            <input required type="text" class="card-text titulo" name="nome" value="{{$produto->nome}}">
            
            <small class="text-body-secondary">Data:
                <input required type="date" name="data_lancamento" min="0" max="1" step="1" value="{{$produto->data_lancamento}}">
            </small>

            <br><br>


            <small class="text-body-secondary">Tem demo (V ou F):
                <input required type="number" name="tem_demo" min="0" max="1" step="1" value="{{$produto->tem_demo}}">
            </small>

            <br><br>

            <small class="text-body-secondary">Preço:
                <input required type="number" name="preco" step="0.01" value="{{$produto->preco}}">
            </small>

            <br><br>

            <small class="text-body-secondary">Estoque:
                <input required type="number" name="quantidade" step="1" value="{{$produto->quantidade}}">
            </small>

            <br><br>

            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <input type="submit" class="btn btn-sm comprar" value="Salvar">
                </div>
            </div>
        </form>
    </div>
      
    </div>
  </div>
</div>

</main>


@endsection