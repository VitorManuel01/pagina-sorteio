<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function () { 
    return 'Laravel está funcionando!';
});

Route::get('/',[HomeController::class, 'index'])->name('home'); // Rota para exibir o formulário de inscrição
Route::post('/inscricao', [ParticipantController::class, 'store'])->name('inscricao.store'); // Rota para processar o formulário de inscrição
Route::get('/loginPage', [AuthController::class, 'loginPage'])->name('loginPage');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('validarOTP', [AuthController::class, 'validarOTP'])->name('validarOTP');
Route::post('/validate-otp', [AuthController::class, 'validateOTP'])->name('validate.otp');

use Twilio\Rest\Client;

Route::get('/test-sms', function () {
    $twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    $message = $twilio->messages->create(
        '+5571999133476', // teu número completo
        [
            'from' => env('TWILIO_NUMBER'),
            'body' => 'Teste Twilio direto funcionando!'
        ]
    );
    dd($message->sid);
});