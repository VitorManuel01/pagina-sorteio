<style>
    /* ======= (Celulares e Tablets) ======= */
    section.sorteio-section {
        background: linear-gradient(90deg, #43ea7a 0%, #1abc9c 100%);
        /* Padding pra garantir o espaçamento nas bordas da tela */
        padding: 2.5rem 1.5rem;
    }

    .sorteio-container {
        display: flex;
        flex-direction: column; /* Layout empilhado por padrão */
        align-items: center;
        justify-content: center;
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto; 
    }

    .sorteio-image img {
        width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.25);
        transition: transform 0.3s ease;
    }

    .sorteio-image img:hover {
        transform: scale(1.02);
    }

    .sorteio-form {
        width: 100%;
        max-width: 420px;
        display: flex;
        justify-content: center;
    }

    /* ======= TELAS MÉDIAS E GRANDES (Apenas Desktops) ======= */
    @media (min-width: 992px) {
        .sorteio-container {
            flex-direction: row; /* Ativa o layout lado a lado APENAS em desktops */
            gap: 3rem;
            align-items: stretch;
        }

        .sorteio-image, .sorteio-form {
            flex: 1; /* Faz com que ambos ocupem metade do espaço */
            margin: 0;
        }

        .sorteio-form {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sorteio-image {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }

    /* ======= TELAS GRANDES (Desktops grandes) ======= */
    @media (min-width: 1200px) {
        section.sorteio-section {
            padding: 4rem 2rem;
        }
    }
</style>

<section class="sorteio-section">
    <div class="sorteio-container">
        <div class="sorteio-image">
            <img src="{{ asset('img/banner-sorteio.png') }}" alt="Banner Sorteio">
        </div>

        <div class="sorteio-form">
            @include('participants.create')
        </div>
    </div>
</section>