<?php

namespace Leeovery\MagicLinkGenerator\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Leeovery\MagicLinkGenerator\MagicLinkGenerator
 * @mixin \Leeovery\MagicLinkGenerator\MagicLinkGenerator
 */
class MagicLinkGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'magic-link-generator';
    }
}
