<?php

namespace Leeovery\MagicLink\Tests;

use Orchestra\Testbench\TestCase;
use Leeovery\MagicLink\MagicLinkServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [MagicLinkServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
