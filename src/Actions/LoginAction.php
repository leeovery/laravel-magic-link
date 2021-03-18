<?php

namespace Leeovery\MagicLink\Actions;

use Illuminate\Support\Facades\Auth;
use Leeovery\MagicLink\MagicLinkManager;
use Illuminate\Contracts\Auth\Authenticatable as User;

class LoginAction
{
    public function __construct(protected MagicLinkManager $magicLinkManager) {}

    public function __invoke(User $user)
    {
        $guard = $this->magicLinkManager->getUserGuard();
        $rememberLogin = $this->magicLinkManager->getRememberLogin();

        Auth::guard($guard)->login($user, $rememberLogin);
    }
}
