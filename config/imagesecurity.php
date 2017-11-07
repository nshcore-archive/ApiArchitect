<?php

	return [

		'imageBytes'    => [
			"image/png"   => "89504E47",
			"image/jpeg"  => "FFD8",
			"image/gif"   => "474946",
			"image/bmp"   => "424D"
		],

		'allowedExtensions'    => [
			'jpeg',
			'jpg',
			'png',
			'gif'
		],

		'allowedMimes'   => [
			'image/png',
			'image/jpeg',
			'image/pjpeg',
			'image/gif'
		],

		'mimeTypeExtensions'	=> [
			'image/png' 	=> 'png',
			'image/jpeg'	=> 'jpeg',
			'image/jpg'		=> 'jpg',
			'image/gif'		=> 'gif'
		],

		'badFileNames' => [
			'c99',
			'r57',
			'shell',
			'rs',
			'backdoor',
			'reverse',
			'x'
		]
	];
