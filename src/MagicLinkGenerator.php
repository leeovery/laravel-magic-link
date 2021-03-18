<?php

namespace Leeovery\MagicLinkGenerator;

use Illuminate\Contracts\Auth\Authenticatable as User;
use Illuminate\Support\Facades\URL;

class MagicLinkGenerator
{
    public User $user;

    public ?string $redirectUrl = null;

    public function __construct(public MagicLinkManager $magicLinkManager) {}

    public function forUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    public function redirectsTo(string $redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;

        return $this;
    }

    public function generate()
    {
        $payload = $this->magicLinkManager->encryptPayload(
            $this->user,
            $this->redirectUrl ?? $this->magicLinkManager->getRedirectUrl()
        );

        return URL::temporarySignedRoute(
            $this->magicLinkManager->getRouteName(),
            $this->magicLinkManager->getRouteExpiry(),
            ['the-magic' => $payload]
        );
    }
}
