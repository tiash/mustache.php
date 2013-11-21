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
 * Unknown filter exception.
 */
class UnknownFilterException extends \UnexpectedValueException implements \Mustache\Exception
{
    protected $filterName;

    public function __construct($filterName)
    {
        $this->filterName = $filterName;
        parent::__construct(sprintf('Unknown filter: %s', $filterName));
    }

    public function getFilterName()
    {
        return $this->filterName;
    }
}
