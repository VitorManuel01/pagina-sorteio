<?php

namespace App;

use Fouladgar\OTP\Contracts\SMSClient;
use Fouladgar\OTP\Notifications\Messages\MessagePayload;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;

class TwilioSMSClient implements SMSClient
{
    protected $twilio;

    public function __construct()
    {
        Log::info('TwilioSMSClient inicializado');
        $this->twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    } //construtor da classe, inicializa o cliente Twilio com as credenciais do .env

    /**
     * @inheritDoc
     */
    public function sendMessage(MessagePayload $payload): mixed //método que envia a mensagem SMS usando o cliente Twilio
    {
        Log::info('Enviando SMS via Twilio', [
            'to' => $payload->to(),
            'body' => $payload->content(),
        ]);

        try {
            $message = $this->twilio->messages->create(
                $payload->to(), //para quem a mensagem será enviada
                [
                    'from' => env('TWILIO_NUMBER'), //quem está enviando a mensagem, no caso, o número do Twilio
                    'body' => $payload->content(),
                ]
            );

            

            return $message->sid;
        } catch (\Exception $e) {
            Log::error('Erro ao enviar SMS via Twilio: ' . $e->getMessage());
            throw $e;
        }
    }
}