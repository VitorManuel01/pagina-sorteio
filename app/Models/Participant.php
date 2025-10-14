<?php

namespace App\Models;

use Fouladgar\OTP\Notifications\OTPNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Fouladgar\OTP\Concerns\HasOTPNotify;
use Fouladgar\OTP\Contracts\OTPNotifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Participant extends Authenticatable implements OTPNotifiable
{
    use HasApiTokens, HasFactory, Notifiable, HasOTPNotify;

    protected $fillable = ['name', 'CPF', 'email', 'phone'];

    /**
     * @inheritDoc
     */
    public function getMobileForOTPNotification(): string
    {
        return $this->phone;
    }

    /**
     * @inheritDoc
     */
    public function routeNotificationForOTP(): string
    {
        return $this->phone;
    }

    /**
     * @inheritDoc
     */
    public function sendOTPNotification(string $token, array $channel): void
    {
        $this->notify(new OTPNotification($token, $channel));
    } //função extremamente necessária para o funcionamento do OTP, ela envia a notificação com o token para o usuário por SMS ou outro canal escolhido
}
