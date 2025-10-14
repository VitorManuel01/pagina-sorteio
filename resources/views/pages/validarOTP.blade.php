@extends('layouts.app')

@section('title', 'Sorteio Verde - Validar OTP')

@section('content')
    <section id="validar-otp" style="max-width:400px;margin:40px auto;">
        <h2>Validação de Código OTP</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group" style="margin-bottom:15px;">
                <label for="otp">Código OTP:</label>
                <input type="text" id="otp" name="otp" class="form-control" required maxlength="6" placeholder="Digite o código OTP">
            </div>
            <button type="submit" class="btn btn-primary">Validar</button>
        </form>
    </section>
@endsection
