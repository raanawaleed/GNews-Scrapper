<?php

/**
 * @package CustomNewsScraper
 */

namespace Inc\Base;

class BaseController
{

	public $plugin_url;
	public function __construct()
	{
		//$this->plugin_path = plugin_dir_path(dirname(__FILE__), 2);
		$this->plugin_url = plugin_dir_url(dirname(__DIR__));
		//$this->theme_url = get_template_directory_uri();
		//$this->theme_url = get_template_directory();
		//$this->plugin =  plugin_basename(dirname(__FILE__), 3) . '/ann-apdg-post-types.php' ;
	}
}
