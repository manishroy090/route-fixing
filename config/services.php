<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
     'client_id' => '222575830287406',
     'client_secret' => '4b930ad48b860bf81477acb667e4e94b',
     'redirect' => 'https://ultrabytemart.com/hamro-qr/callback/facebook',
    ],
   
   'google' => [
        'client_id' => '577218849912-26af9sgnb40at8q1n29jvdfjh6h381fl.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://ultrabytemart.com/hamro-qr/callback/google',
    ],

    // 'google' => [
    //     'client_id' => '885259876439-pj0repbulek28tol51h40rq7s6vee4vt.apps.googleusercontent.com',
    //     'client_secret' => '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',
    //     'redirect' => 'https://hamroqrmenu.com/callback/google',
    // ],
];
