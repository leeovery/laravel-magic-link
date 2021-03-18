<?php

namespace Leeovery\MagicLink\Http\Controllers;

use Illuminate\Http\Request;
use Leeovery\MagicLink\Actions\LoginAction;
use Leeovery\MagicLink\Exceptions\MagicLinkException;
use Leeovery\MagicLink\MagicLinkManager;

class MagicLinkController
{
    public function __invoke(
        Request $request,
        MagicLinkManager $magicLinkManager,
        LoginAction $loginAction
    ) {
        if (! url()->hasCorrectSignature($request)) {
            throw MagicLinkException::incorrectSignature(
                $magicLinkManager->getInvalidSignatureMessage()
            );
        }

        if (! url()->signatureHasNotExpired($request)) {
            throw MagicLinkException::expiredLink(
                $magicLinkManager->getExpiredLinkMessage()
            );
        }

        if ($magicLinkManager->shouldUseOnceOnly()
            && $magicLinkManager->linkUsed($request->fullUrl())
        ) {
            throw MagicLinkException::linkUsed(
                $magicLinkManager->getLinkUsedMessage()
            );
        }

        [
            'user'     => $user,
            'redirect' => $redirect,
            'expiry'   => $expiry,
        ] = $magicLinkManager->decryptPayload($request->input('the-magic'));

        $loginAction($user);

        $magicLinkManager->markLinkAsUsed($request->fullUrl(), $expiry);

        return redirect($redirect);
    }
}
