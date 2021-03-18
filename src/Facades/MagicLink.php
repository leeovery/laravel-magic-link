<?php

namespace Leeovery\MagicLink\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Leeovery\MagicLink\MagicLink
 * @mixin \Leeovery\MagicLink\MagicLink
 */
class MagicLink extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'magic-link';
    }
}
