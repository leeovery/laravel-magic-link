<?php

namespace Leeovery\MagicLinkGenerator;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MagicLinkGeneratorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('magic-link-generator')
            ->hasConfigFile()
            ->hasRoute('web');
    }

    public function packageRegistered()
    {
        $this->app->singleton('magic-link-generator', function () {
            return new MagicLinkGenerator(
                resolve(MagicLinkManager::class)
            );
        });

        $this->app->singleton(MagicLinkManager::class, function () {
            return new MagicLinkManager(
                new MagicLinkConfig(
                    $this->app->make('config')->get('magic-link-generator')
                )
            );
        });
    }
}
