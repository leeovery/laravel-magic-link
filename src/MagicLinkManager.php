<?php

namespace Leeovery\MagicLinkGenerator;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable as User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Traits\ForwardsCalls;

/**
 * @mixin MagicLinkConfig
 */
class MagicLinkManager
{
    use ForwardsCalls;

    public function __construct(public MagicLinkConfig $config) {}

    public function encryptPayload(User $user, $redirectUrl): string
    {
        return Crypt::encrypt([
            'id'       => $user->getAuthIdentifier(),
            'redirect' => $redirectUrl,
            'expiry'   => $this->getRouteExpiry()->timestamp,
        ]);
    }

    public function __call(string $method, array $parameters)
    {
        return $this->forwardCallTo($this->getConfig(), $method, $parameters);
    }

    public function getConfig(): MagicLinkConfig
    {
        return $this->config;
    }

    public function decryptPayload($payload): array
    {
        $payload = Crypt::decrypt($payload);

        return [
            'user'     => $this->getUser($payload['id']),
            'redirect' => $payload['redirect'],
            'expiry'   => Carbon::createFromTimestamp($payload['expiry']),
        ];
    }

    public function getUser($id): User
    {
        return Auth::guard($this->getUserGuard())
            ->getProvider()
            ->retrieveById($id);
    }

    public function linkUsed($url): bool
    {
        return cache()->has(md5($url));
    }

    public function markLinkAsUsed($url, Carbon $expiry): void
    {
        cache()->set(md5($url), true, $expiry->addHour());
    }
}
