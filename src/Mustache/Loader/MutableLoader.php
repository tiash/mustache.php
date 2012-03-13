<?php

/*
 * This file is part of Mustache.php.
 *
 * (c) 2012 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mustache\Loader;

/**
 * Mustache Template mutable Loader interface.
 */
interface MutableLoader {

	/**
	 * Set an associative array of Template sources for this loader.
	 *
	 * @param array $templates
	 */
	function setTemplates(array $templates);

	/**
	 * Set a Template source by name.
	 *
	 * @param string $name
	 * @param string $template Mustache Template source
	 */
	function setTemplate($name, $template);
}