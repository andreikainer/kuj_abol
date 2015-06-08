<?php

return [

	'mandrill' => [
		'secret' => env('MANDRILL_KEY'),
	],

    'mpay24' => [
        'merchantId' => '93686',
        'password' => 'oXMxw+6LEW',
        'test' => true,
        'debug' => true,
        'successUrl' => 'PaymentController@anySuccess',
        'errorUrl' => 'PaymentController@anyError',
        'confirmationUrl' => 'PaymentController@anyConfirmation',
    ],

];
