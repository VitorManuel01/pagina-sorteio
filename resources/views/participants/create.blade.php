<style>
    .card {
        background: linear-gradient(135deg, #2980b9 0%, #6dd5fa 100%);
        border-radius: 16px;
        border: 2px solid rgba(255, 255, 255, 0.5);
        box-shadow:
            0 6px 20px rgba(0, 0, 0, 0.25),
            0 0 0 4px rgba(255, 255, 255, 0.08) inset;
        color: #fff;
        padding: 1.8rem;
        text-align: center;
        max-width: 100%;
        width: 100%;
        margin: 2rem auto;
        position: relative;
        backdrop-filter: blur(8px);
    }

    /* Cria um “glow” suave atrás do card */
    .card::before {
        content: "";
        position: absolute;
        inset: -5px;
        background: linear-gradient(135deg, #6dd5fa33, #2980b933);
        border-radius: 20px;
        z-index: -1;
        filter: blur(12px);
    }

    .card h3 {
        font-size: 1.4rem;
        margin-bottom: 1.5rem;
        font-weight: 600;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
    }

    .form-floating {
        margin-bottom: 1rem;
        margin-right: 2rem;
    }

    .form-control {
        width: 100%;
        border-radius: 10px;
        border: 1px solid #6dd5fa;
        box-shadow: none;
        font-size: 1rem;
        padding: 1rem;
        background: #f7fbff;
        transition: border-color 0.2s, background 0.2s;
    }

    .form-control:focus {
        border-color: #2980b9;
        box-shadow: 0 0 0 2px #6dd5fa33;
        background: #eaf6ff;
        outline: none;
    }

    .btn-primary {
        background-color: #27ae60;
        border: 2px solid #1e8449;
        border-radius: 12px;
        color: #fff;
        font-weight: 700;
        letter-spacing: 0.5px;
        font-size: 1.05rem;
        padding: 1rem;
        width: 100%;
        margin-top: 0.5rem;
        box-shadow: 0 5px 15px rgba(39, 174, 96, 0.35);
        transition: all 0.25s ease;
    }

    .btn-primary:hover {
        background-color: #219150;
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(39, 174, 96, 0.45);
    }

    .alert-success {
        border-radius: 8px;
        font-size: 0.95rem;
        background: #e8f9ee;
        color: #1e8449;
        border: 1px solid #27ae60;
        padding: 0.75rem;
        margin-bottom: 1rem;
    }

    /* ======= DESKTOP ======= */
    @media (min-width: 768px) {
        .card {
            width: 420px;
            padding: 2rem;
            margin: 3rem auto;
            border-width: 3px;
            border-color: rgba(255, 255, 255, 0.6);
            box-shadow:
                0 8px 26px rgba(0, 0, 0, 0.3),
                0 0 0 5px rgba(255, 255, 255, 0.1) inset;
        }

        .card h3 {
            font-size: 1.6rem;
        }

        .btn-primary {
            font-size: 1.15rem;
        }
    }
</style>

<div class="card shadow">
    <h3>Inscreva-se no Sorteio</h3>

    <!-- mensagem de sucesso -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Formulário de inscrição -->
    <form action="{{ route('inscricao.store') }}" method="POST">
        @csrf
        <div class="form-floating">
            <input type="text" name="name" id="name" class="form-control" placeholder="Nome" required>
        </div>
        <div class="form-floating">
            <input type="text" name="CPF" id="CPF" class="form-control" placeholder="CPF" required pattern="\d*" inputmode="numeric">
        </div>

        <div class="form-floating">
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefone" required>
        </div>

        <div class="form-floating">
            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
        </div>

        <button type="submit" class="btn-primary">Quero Participar</button>
    </form>
</div>