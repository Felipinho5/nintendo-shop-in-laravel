@extends('layouts/base')
@section('titulo', 'Loja Nintendo')
@section('links-extra')
    <link rel="stylesheet" href="{{ asset('css/loja.css') }}">
@endsection

@section('conteudo')

<header>

<div class="cabecalho navbar">
  <div class="container">

    <div class="logo">
        <img src="{{ asset('images/nintendo-nobg.png') }}">
    </div>

    <div class="usuario">
      <a href="{{ route('/login') }}" class="perfil">admiii
      </a>
        <div>
            <a href="{{ route('/login') }}" class="perfil">
                <img src="{{ asset('images/mii.png') }}">
                <div>Admin</div>
            </a>
        </div>
        <div class="bandeira">
            <img src="{{ asset('images/brasil.webp')}}">
        </div>
    </div>

  </div>
</div>
</header>

<main>

<section class="imagem">
  {{-- <img src="{{ asset('images/gamers.avif') }}"> --}}
</section>

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
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm comprar">Comprar</button>
                </div>
                <small class="text-body-secondary">Estoque: {{$produto->quantidade}}</small>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      
    </div>
  </div>
</div>

</main>

<footer class="rodape text-body-secondary py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Voltar ao topo</a>
        </p>
        <p class="mb-1">&copy; Nintendo. Os jogos são propriedade de seus respectivos donos.</p>
        <p class="mb-0">Nintendo of America Inc. A sede está localizada em Redmond, Washington (EUA).</p>
    </div>
</footer>
@endsection