<?php

/**
 * @package CustomNewsScraper
 */

namespace Inc\Base;

class Activate
{
	public static function activate(): void {
		flush_rewrite_rules();
	}

}