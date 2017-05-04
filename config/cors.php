<?php
return [

    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
    'allowedMethods' => ['GET','POST','PUT','DELETE'],
    'exposedHeaders' => [],
    'maxAge' => 0,
    'hosts' => [],
    'allowedHeaders' => [
        'Content-Type',
        'Authorization',
        'field',
        'X-Socket-ID'
        ],
];
