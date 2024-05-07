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

    // google
    'google' => [
        'client_id' => '51049101418-kd89b3cabdsitk0a3pdebuqnjbati1qg.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => '/Auth/google/callback',
    ],

    // github
    'github' => [
        'client_id' => 'Ov23liTuePEEbDOe0lsk',
        'client_secret' => '20d360b288188ebedd27c346bb24abfc25ca6249',
        'redirect' => '/auth/github/callback',
    ],

];
