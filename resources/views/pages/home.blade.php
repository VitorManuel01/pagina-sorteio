<!--aqui ele esetende o layout principal da aplicação, ou seja, é da arquivo app o seu conteúdo-->
@extends('layouts.app')

<!-- aqui ele seta o título da página -->
@section('title', 'Sorteio Verde - Home')

<!-- o conteúdo em si -->
@section('content')

    <!-- Seção se inscreva -->
    @include('components.se-inscreva')

    <!-- Seção Como Participar Temporaria -->
    <section id="como-participar">
        <h2>Como Participar</h2>
        <p>Cadastre seu CPF e o código da nota fiscal para gerar seus números da sorte.</p>
        <a href="{{ route('home') }}#inscricao" class="btn">Cadastre-se agora</a>
    </section>

    <!-- Seção Aumente suas Chances Temporaria -->
    <section id="aumente-suas-chances">
        <h2>Aumente suas chances</h2>
        <p>Quanto mais cupons você cadastrar, mais números da sorte você acumula!</p>
    </section>
@endsection
