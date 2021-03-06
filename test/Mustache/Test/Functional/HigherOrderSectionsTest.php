<?php

/*
 * This file is part of Mustache.php.
 *
 * (c) 2012 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mustache\Test\Functional;

/**
 * @group lambdas
 * @group functional
 */
class HigherOrderSectionsTest extends \PHPUnit_Framework_TestCase
{

    private $mustache;

    public function setUp()
    {
        $this->mustache = new \Mustache\Engine;
    }

    public function testRuntimeSectionCallback()
    {
        $tpl = $this->mustache->loadTemplate('{{#doublewrap}}{{name}}{{/doublewrap}}');

        $foo = new Foo;
        $foo->doublewrap = array($foo, 'wrapWithBoth');

        $this->assertEquals(sprintf('<strong><em>%s</em></strong>', $foo->name), $tpl->render($foo));
    }

    public function testStaticSectionCallback()
    {
        $tpl = $this->mustache->loadTemplate('{{#trimmer}}    {{name}}    {{/trimmer}}');

        $foo = new Foo;
        $foo->trimmer = array(get_class($foo), 'staticTrim');

        $this->assertEquals($foo->name, $tpl->render($foo));
    }

    public function testViewArraySectionCallback()
    {
        $tpl = $this->mustache->loadTemplate('{{#trim}}    {{name}}    {{/trim}}');

        $foo = new Foo;

        $data = array(
            'name' => 'Bob',
            'trim' => array(get_class($foo), 'staticTrim'),
        );

        $this->assertEquals($data['name'], $tpl->render($data));
    }

    public function testMonsters()
    {
        $tpl = $this->mustache->loadTemplate('{{#title}}{{title}} {{/title}}{{name}}');

        $frank = new Monster();
        $frank->title = 'Dr.';
        $frank->name  = 'Frankenstein';
        $this->assertEquals('Dr. Frankenstein', $tpl->render($frank));

        $dracula = new Monster();
        $dracula->title = 'Count';
        $dracula->name  = 'Dracula';
        $this->assertEquals('Count Dracula', $tpl->render($dracula));
    }
}

class Foo
{
    public $name = 'Justin';
    public $lorem = 'Lorem ipsum dolor sit amet,';

    public function wrapWithEm($text)
    {
        return sprintf('<em>%s</em>', $text);
    }

    public function wrapWithStrong($text)
    {
        return sprintf('<strong>%s</strong>', $text);
    }

    public function wrapWithBoth($text)
    {
        return self::wrapWithStrong(self::wrapWithEm($text));
    }

    public static function staticTrim($text)
    {
        return trim($text);
    }
}

class Monster
{
    public $title;
    public $name;
}
