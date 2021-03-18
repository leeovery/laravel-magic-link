<?php

use Illuminate\Support\Facades\Route;
use Leeovery\MagicLinkGenerator\Http\Controllers\MagicLinkGeneratorController;

Route::get(
    config('magic-link-generator.login_route'),
    MagicLinkGeneratorController::class
)
    ->middleware(config('magic-link-generator.login_middleware'))
    ->name(config('magic-link-generator.login_route_name'));
