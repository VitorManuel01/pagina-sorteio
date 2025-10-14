<?php


return [


    'default_provider' => 'participants',


    'user_providers'   => [
        'participants' => [
            'model'      => \App\Models\Participant::class,
            'repository' => \Fouladgar\OTP\NotifiableRepository::class,
            'mobile_column' => 'phone',
        ],

    ],


    'mobile_column'    => 'phone',


    'token_table'      => 'otp_tokens',


    'token_length'     => env('OTP_TOKEN_LENGTH', 6),


    'token_lifetime'   => env('OTP_TOKEN_LIFE_TIME', 5),

 
    'prefix'           => 'otp_',


    'sms_client' => \App\TwilioSMSClient::class,

    'token_storage'    => env('OTP_TOKEN_STORAGE', 'cache'),


    'channel'          => \Fouladgar\OTP\Notifications\Channels\OTPSMSChannel::class,
];
