<?php

/*
 * This file is part of Mustache.php.
 *
 * (c) 2012 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mustache\Test;

/**
 * @group unit
 */
class TemplateTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $mustache = new \Mustache\Engine;
        $template = new TemplateStub($mustache);
        $this->assertSame($mustache, $template->getMustache());
    }

    public function testRendering()
    {
        $rendered = '<< wheee >>';
        $mustache = new \Mustache\Engine;
        $template = new TemplateStub($mustache);
        $template->rendered = $rendered;
        $context  = new \Mustache\Context;

        if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
            $this->assertEquals($rendered, $template());
        }

        $this->assertEquals($rendered, $template->render());
        $this->assertEquals($rendered, $template->renderInternal($context));
        $this->assertEquals($rendered, $template->render(array('foo' => 'bar')));
    }
}

class TemplateStub extends \Mustache\Template
{
    public $rendered;

    public function getMustache()
    {
        return $this->mustache;
    }

    public function renderInternal(\Mustache\Context $context, $indent = '', $escape = false)
    {
        return $this->rendered;
    }
}
