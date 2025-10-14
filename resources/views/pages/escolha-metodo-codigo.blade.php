@extends('layouts.app')

@section('title', 'Sorteio Verde - Escolha Método OTP')

@section('content')
    <section id="escolha-metodo-otp" style="max-width:400px;margin:40px auto;">
        <h2>Escolha o Método de Recebimento do Código OTP</h2>
        <form method="POST" action="{{ route('envia.otp') }}">
            @csrf
            <div class="form-group" style="margin-bottom:15px;">
                <label for="metodo">Selecione o método:</label>
                <select id="metodo" name="metodo" class="form-control" required>
                    <option value="">-- Escolha --</option>
                    <option value="sms">SMS</option>
                    <option value="email">E-mail</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
    </section>
@endsection
