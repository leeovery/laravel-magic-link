<?php

namespace Leeovery\MagicLink;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MagicLinkServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('magic-link')
            ->hasConfigFile()
            ->hasRoute('web');
    }

    public function packageRegistered()
    {
        $this->app->singleton('magic-link', function () {
            return new MagicLink(
                resolve(MagicLinkManager::class)
            );
        });

        $this->app->singleton(MagicLinkManager::class, function () {
            return new MagicLinkManager(
                new MagicLinkConfig(
                    $this->app->make('config')->get('magic-link')
                )
            );
        });
    }
}
