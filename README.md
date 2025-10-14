# 🎟️ Página de Sorteio — Laravel + Twilio OTP

Este projeto é uma aplicação web desenvolvida em **Laravel 9**, que permite que usuários se cadastrem para participar de sorteios, validando seu número de telefone via **código OTP (One-Time Password)** enviado por **SMS através do Twilio**.  
Os **cupons fiscais** dos participantes serão processados em uma **API separada**, desenvolvida em **Java Spring Boot**.

---

## 🚀 Funcionalidades

- 📱 **Autenticação via SMS (OTP)** — Envio automático de código de verificação por SMS com Twilio.  
- 👤 **Cadastro de participantes** — Registro com nome, CPF, e telefone com validação.  
- 🔒 **Login seguro** — O usuário faz login apenas após validar o OTP.  
- ⚙️ **Integração modular** — Backend Laravel para usuários e autenticação, com integração planejada para API de cupons em Java Spring Boot.  
- 🧾 **Estrutura MVC limpa** — Totalmente organizada conforme padrões Laravel.

---

## 🧩 Tecnologias Utilizadas

| Categoria | Tecnologias |
|------------|--------------|
| Backend | PHP 8.0+, Laravel 9 |
| Autenticação | [fouladgar/laravel-otp](https://github.com/fouladgar/laravel-otp) |
| SMS | [Twilio SDK](https://www.twilio.com/docs/libraries/php) |
| Frontend | Blade, Vite, CSS nativo |
| Banco de Dados | MySQL |
| Outras | Laravel Sanctum, GuzzleHTTP |

---

## ⚙️ Configuração do Ambiente

### 1️⃣ Clone o repositório

```bash
git clone https://github.com/vitormanuel01/pagina-sorteio.git
cd pagina-sorteio
```

### 2️⃣ Instale as dependências

```bash
composer install
npm install
```

### 3️⃣ Configure o `.env`

Crie um arquivo `.env` com base no `.env.example` e preencha as variáveis:

```bash
cp .env.example .env
php artisan key:generate
```

Adicione suas credenciais Twilio:

```env
TWILIO_SID=seu_sid
TWILIO_AUTH_TOKEN=seu_auth_token
TWILIO_NUMBER=+55XXXXXXXXXXX
```

E configure o banco de dados:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pagina_sorteio
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Execute as migrações

```bash
php artisan migrate
```

### 5️⃣ Inicie o servidor

```bash
php artisan serve
```

---

## 🧠 Estrutura de Pastas

```
app/
 ├── Http/Controllers/     # Controladores da aplicação
 ├── Models/               # Modelos Eloquent
 ├── TwilioSMSClient.php   # Integração com Twilio
resources/views/           # Templates Blade
routes/web.php             # Rotas web
routes/api.php             # Rotas para futura integração com API Java
```

---

## 🔐 Fluxo de Login com OTP

1. O usuário informa o **CPF**.  
2. O sistema busca o participante e envia o código via **SMS (Twilio)**.  
3. O participante insere o código recebido.  
4. Caso o código seja válido, ele é autenticado e redirecionado para a **página do usuário**.

---

## 🧱 Integração futura

Os cupons fiscais dos participantes serão gerenciados por uma **API externa** em **Java Spring Boot**, conectada via REST, permitindo:
- Cadastro e validação de cupons
- Histórico de cupons por participante
- Relatórios de sorteio

---

## ✨ Autor

**Vitor Manuel Pereira dos Santos**  
📬 [GitHub](https://github.com/vitormanuel01)
