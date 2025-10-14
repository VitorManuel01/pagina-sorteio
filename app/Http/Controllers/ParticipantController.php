<?php

namespace App\Http\Controllers;

use Fouladgar\OTP\Contracts\SMSClient;

use Fouladgar\OTP\Notifications\Messages\OTPMessage;
use Illuminate\Http\Request;
use App\Models\Participant;
use Fouladgar\OTP\Notifications\OTPNotification;
use Twilio\Rest\Client;

class ParticipantController extends Controller
{

    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'CPF' => 'required|string|max:11',
            'email' => 'nullable|email|unique:participants,email',
            'phone' => 'required|string|max:20|unique:participants,phone',
        ]);


        // Remove caracteres não numéricos do telefone e adiciona o +55 para números brasileiros
 
        $phone = preg_replace('/\D/', '', $validated['phone']);
        if (strlen($phone) === 11) { // Se for celular brasileiro (com DDD)
            $phone = '+55' . $phone;
        }
        $validated['phone'] = $phone;

        // Criação do participante no banco de dados
        Participant::create($validated); // Usa o modelo Participant validado para criar um novo registro

        // Redireciona de volta com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Inscrição realizada com sucesso!');
    }

    // public function boot(){
    //     OTPNotification::toSMSUsing(fn($notifiable, $token)=> (new OTPMessage())
    //         ->to($notifiable->phone, $token)
    //         ->content("Seu código de verificação é: {$token}"))
    //         ->template('OTP_TEMPLATE');
    // }


    // private function sendMessage($message, $recipients)
    // {
    //     $account_sid = getenv("TWILIO_SID");
    //     $auth_token = getenv("TWILIO_AUTH_TOKEN");
    //     $twilio_number = getenv("TWILIO_NUMBER");
    //     $client = new Client($account_sid, $auth_token);
    //     $client->messages->create(
    //         $recipients,
    //         ['from' => $twilio_number, 'body' => $message]
    //     );
    // }

}

