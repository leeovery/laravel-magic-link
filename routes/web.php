<?php

use Illuminate\Support\Facades\Route;
use Leeovery\MagicLink\Http\Controllers\MagicLinkController;

Route::get(
    config('magic-link.login_route'),
    MagicLinkController::class
)
    ->middleware(config('magic-link.login_middleware'))
    ->name(config('magic-link.login_route_name'));
