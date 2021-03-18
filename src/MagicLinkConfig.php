<?php /** @noinspection PhpUnused */

namespace Leeovery\MagicLinkGenerator;

use Carbon\Carbon;

class MagicLinkConfig
{
    public function __construct(public array $config) {}

    public function getRouteExpiry(): Carbon
    {
        return now()->addMinutes(data_get($this->config, 'login_route_expires'));
    }

    public function getUserGuard(): string
    {
        return data_get($this->config, 'user_guard');
    }

    public function getRememberLogin(): string
    {
        return data_get($this->config, 'remember_login');
    }

    public function getRouteName(): string
    {
        return data_get($this->config, 'login_route_name');
    }

    public function getRedirectUrl(): string
    {
        return data_get($this->config, 'redirect_on_success');
    }

    public function getInvalidSignatureMessage(): string
    {
        return data_get($this->config, 'invalid_signature_message');
    }

    public function getExpiredLinkMessage(): string
    {
        return data_get($this->config, 'expired_link_message');
    }

    public function getLinkUsedMessage(): string
    {
        return data_get($this->config, 'link_used_message');
    }

    public function shouldUseOnceOnly(): bool
    {
        return data_get($this->config, 'use_one_time_use_links');
    }
}
