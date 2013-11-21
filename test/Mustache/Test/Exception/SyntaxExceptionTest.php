<?php

/*
 * This file is part of Mustache.php.
 *
 * (c) 2013 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mustache\Test\Exception;

class SyntaxExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $e = new \Mustache\Exception\SyntaxException('whot', array('is' => 'this'));
        $this->assertTrue($e instanceof \LogicException);
        $this->assertTrue($e instanceof \Mustache\Exception);
    }

    public function testGetToken()
    {
        $token = array(\Mustache\Tokenizer::TYPE => 'whatever');
        $e = new \Mustache\Exception\SyntaxException('ignore this', $token);
        $this->assertEquals($token, $e->getToken());
    }
}
