<?php

return [

    'imagebytes'    => [
        "jpeg"  => "FFD8", 
        "png"   => "89504E470D0A1A0A", 
        "gif"   => "474946",
        "bmp"   => "424D", 
        "tiff"  => "4949",
        "tiff"  => "4D4D"
    ],

    'allowedext'    => [
        'jpeg','jpg','png','gif'
    ],

    'allowedmime'   => [
        'image/png','image/jpeg','image/pjpeg','image/gif'
    ],

    'disgustingfilename' => [
        'c99','r57','shell','rs','backdoor','reverse', 'x'
    ]

];
