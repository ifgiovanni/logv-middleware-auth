<?php

return [

     /* -----------------------------------------------------------------
     |  Credentials
     | -----------------------------------------------------------------
     |  Set the credentials to access the log viewer page.
     */

    'LOG_VIEWER_USER' => env('LOG_VIEWER_USER', ''),
    'LOG_VIEWER_PASSWORD' => env('LOG_VIEWER_PASSWORD', ''),

    /* -----------------------------------------------------------------
     |  Expiration
     | -----------------------------------------------------------------
     |  Set the expiration time for the JWT token.
     */
    'LOG_VIEWER_AUTH_EXPIRATION' => env('LOG_VIEWER_AUTH_EXPIRATION', 60),

    /* -----------------------------------------------------------------
     |  Secret
     | -----------------------------------------------------------------
     |  Set the secret to generate the JWT token.
     */
    'LOG_VIEWER_AUTH_SECRET' => env('LOG_VIEWER_AUTH_SECRET', 'secret'),

    /* -----------------------------------------------------------------
     |  Cookie
     | -----------------------------------------------------------------
     |  Set the cookie name to store the JWT token.
     */
    'LOG_VIEWER_COOKIE' => env('LOG_VIEWER_COOKIE', '_sma__token'),
];