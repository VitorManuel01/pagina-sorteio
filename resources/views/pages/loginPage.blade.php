@extends('layouts.app')

@section('title', 'Sorteio Verde - Login')

@section('content')
    <!-- mensagem de sucesso -->
    @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
    @endif
    <section id="login-usuario" style="max-width:400px;margin:40px auto;">
        <h2>Login do Usuário</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group" style="margin-bottom:15px;">
                <label for="cpf">CPF:</label>
                <input type="text" id="CPF" name="CPF" class="form-control" required maxlength="14" placeholder="Digite seu CPF">
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </section>
@endsection
