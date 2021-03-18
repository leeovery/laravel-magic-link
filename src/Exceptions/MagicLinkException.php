<?php

namespace Leeovery\MagicLinkGenerator\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class MagicLinkException extends HttpException
{
    public static function incorrectSignature($message = null)
    {
        $message ??= 'This link has been tampered with.';

        return new self(401, $message);
    }

    public static function expiredLink($message = null)
    {
        $message ??= 'This link has expired.';

        return new self(401, $message);
    }

    public static function linkUsed($message = null)
    {
        $message ??= 'This link was already used. Please request a fresh one to login.';

        return new self(401, $message);
    }
}
