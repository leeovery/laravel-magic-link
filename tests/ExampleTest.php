<?php

namespace Leeovery\MagicLinkGenerator\Tests;

use Orchestra\Testbench\TestCase;
use Leeovery\MagicLinkGenerator\MagicLinkGeneratorServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [MagicLinkGeneratorServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
