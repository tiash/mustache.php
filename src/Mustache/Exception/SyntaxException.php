<?php

/*
 * This file is part of Mustache.php.
 *
 * (c) 2013 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mustache\Exception;

/**
 * Mustache syntax exception.
 */
class SyntaxException extends \LogicException implements \Mustache\Exception
{
    protected $token;

    public function __construct($msg, array $token)
    {
        $this->token = $token;
        parent::__construct($msg);
    }

    public function getToken()
    {
        return $this->token;
    }
}
