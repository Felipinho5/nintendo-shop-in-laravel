@extends('layouts/base')
@section('titulo', 'Loja Nintendo')
@section('links-extra')
    <link rel="stylesheet" href="{{ asset('css/loja.css') }}">
@endsection

@section('conteudo')

<main>

<div class="album py-5 bg-body-tertiary">
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    @foreach ($produtos as $produto)
        <div class="col jogo">
          <div class="card shadow-sm">
            <img class="bd-placeholder-img card-img-top" width="100%" src="{{ asset('images/' . $produto->imagem . '.avif') }}">
            <div class="card-body">
              <p class="card-text titulo">{{$produto->nome}}</p>
              <p class="data">{{$produto->data_formatada}}</p>
              
              @if ($produto->tem_demo)
                <p class="demo">Demo disponível</p>
              @endif  
              
              <p>R${{$produto->preco}}</p>
              <div class="d-flex justify-content-between align-items-center" style="flex-wrap: wrap;">
                <div class="btn-group">
                  <a href="{{ route('admin.editar', ['produto' => $produto->id]) }}" type="button" class="btn btn-sm comprar">Editar</a>
                </div>
                <div class="btn-group">
                  <a href="{{ route('admin.deletar', ['produto' => $produto->id]) }}" type="button" class="btn btn-sm comprar">Deletar</a>
                </div>
                <small class="text-body-secondary">Estoque: {{$produto->quantidade}}</small>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      
    </div>

    <div class="inserir-novo-jogo">
      <a href={{ route('admin.adicionar') }}>Inserir novo jogo</a>
    </div>
  </div>

</div>


</main>


@endsection