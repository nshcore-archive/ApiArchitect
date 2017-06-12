<?php

  return [
    'facebook' => [
      'client_id'     => env('FACEBOOK_ID'),
      'client_secret' => env('FACEBOOK_SECRET'),
      'redirect'      => env('FACEBOOK_URL'),
    ],
    'google' => [
      'client_id'     => env('GOOGLE_ID'),
      'client_secret' => env('GOOGLE_SECRET'),
      'redirect'      => env('GOOGLE_URL'),
    ],
    'linkedin' => [
      'client_id'     => env('LINKEDIN_ID'),
      'client_secret' => env('LINKEDIN_SECRET'),
      'redirect'      => env('LINKEDIN_URL'),
    ],
    'bitbucket' => [
      'client_id'     => env('BITBUCKET_ID'),
      'client_secret' => env('BITBUCKET_SECRET'),
      'redirect'      => env('BITBUCKET_URL'),
    ], 
    'github' => [
      'client_id'     => env('GITHUB_ID'),
      'client_secret' => env('GITHUB_SECRET'),
      'redirect'      => env('GITHUB_URL'),
    ],               
  ];