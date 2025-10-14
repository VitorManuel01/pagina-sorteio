<header style="background-color: #008037; color: white; padding: 15px 0;">
    <div class="container"
        style="display: flex; align-items: center; justify-content: space-between; max-width: 1200px; margin: 0 auto;">

        <!-- Logo -->
        <div class="logo" style="display: flex; align-items: center; gap: 10px;">
            <img src="{{ asset('img/logo-vm-santos-mercado.png') }}" alt="Logo do Mercado" style="height: 50px;">
            <h1 style="font-size: 1.5rem; margin: 0;">Sorteio Verde</h1>
        </div>

        <!-- Navegação -->
        <nav>
            <ul style="list-style: none; display: flex; gap: 25px; margin: 0; padding: 0;">
                <li><a href="#como-participar">Como Participar</a></li>
                <li><a href="#aumente-suas-chances">Aumente suas chances</a></li>
                
                <li><a href="{{ route('loginPage') }}" style="color: white; text-decoration: none; font-weight: bold;">Meus números da sorte</a></li>
            </ul>
        </nav>
    </div>
</header>