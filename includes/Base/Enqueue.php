<?php

/**
 * @package CustomNewsScraper
 */

namespace Inc\Base;

class Enqueue
{
	public function register(): void
	{
		add_action('admin_enqueue_scripts', array($this, 'enqueue'));
	}

	public function enqueue(): void
	{
		//enqueue plugin styles and scripts
		wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css');
		wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', array('jquery'));

		wp_enqueue_style('NewsStyle', PLUGIN_URL  . 'assets/css/newsStyle.css');
		wp_enqueue_script('NewsScript', PLUGIN_URL  . 'assets/js/newsScript.js');
	}
}
