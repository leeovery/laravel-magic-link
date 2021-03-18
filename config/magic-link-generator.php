<?php

return [
    'login_route'      => env('MAGIC_LINK_LOGIN_ROUTE', '/magic-login'),
    'login_route_name' => env('MAGIC_LINK_LOGIN_ROUTE_NAME', 'magic-login'),

    'user_guard'       => env('MAGIC_LINK_USER_GUARD', 'web'),
    'login_middleware' => env('MAGIC_LINK_LOGIN_MIDDLEWARE', 'web'),

    'remember_login' => env('MAGIC_LINK_REMEMBER_LOGIN', true),

    'login_route_expires'    => env('MAGIC_LINK_LOGIN_ROUTE_EXPIRES', '5'),
    'redirect_on_success'    => env('MAGIC_LINK_REDIRECT_ON_LOGIN', '/'),
    'use_one_time_use_links' => env('MAGIC_LINK_ONE_TIME_USE_LINKS', true),

    'invalid_signature_message' => env('MAGIC_LINK_INVALID_SIGNATURE_MESSAGE', ''),
    'expired_link_message'      => env('MAGIC_LINK_EXPIRED_LINK_MESSAGE', ''),
    'link_used_message'         => env('MAGIC_LINK_LINK_USED_MESSAGE', ''),
];
