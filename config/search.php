<?php

return [
    'elasticsearch'   => [
        'type'      => env('SEARCH_SERVER_TYPE','elasticsearch'),
        'host'      => env('SEARCH_SERVER_HOST', '127.0.0.1'),
        'port'      => env('SEARCH_SERVER_PORT', '9200'),
        'timeout'   => env('SEARCH_SERVER_TIMEOUT', '2'),
        'protocol'	=> env('SEARCH_SERVER_PROTOCOL', 'http://')
    ]
];