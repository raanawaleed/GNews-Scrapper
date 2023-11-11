<?php

/**
 * @package CustomNewsScraper
 */
/*
 Plugin Name: Custom News Scraper
 Plugin URL: 
 Description: News Scraper
 Version: 1.0.0
 Author: Waleed Raza
 Author URL: 
 License: later
 */


defined( 'ABSPATH' ) or die( 'No, thank you.' );

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/*
 * To Activate Plugin
 */
function activate_custom_news_scraper_plugin(): void {
    \Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_custom_news_scraper_plugin');

/*
 * To DeActivate Plugin
 */
function deactivate_custom_news_scraper_plugin(): void {
	\Inc\Base\Deactivate::deactivate();

}
register_deactivation_hook(__FILE__, 'deactivate_custom_news_scraper_plugin');

if (class_exists('Inc\\Init')){
	Inc\Init::register_services();
}