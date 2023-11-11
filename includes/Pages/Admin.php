<?php

/**
 * @package  CustomNewsScraper
 */

namespace Inc\Pages;


use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
	public $settings;

	public $callbacks;

	public $pages = array();

	public $subpages = array();

	public function register() 
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setPages();

		$this->setSubpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages($this->pages)->withSubPage('Dashoard')->addSubPages($this->subpages)->register();
	}

	public function setPages()
	{
		$this->pages = array(
			array(
				'page_title' => 'GNews Plugin',
				'menu_title' => 'GNews',
				'capability' => 'manage_options',
				'menu_slug' => 'gnews_plugin',
				'callback' => array($this->callbacks, 'adminDashboard'),
				'icon_url' => 'dashicons-store',
				'position' => 110
			)
		);
	}

	public function setSubpages()
	{
		$this->subpages = array(
			array(
				'parent_slug' => 'gnews_plugin',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'GNews',
				'capability' => 'manage_options',
				'menu_slug' => 'Gnews_post',
				'callback' => function () {
					echo '<h1>GNews</h1>';
				}
			)
		);
	}

	public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'news_options_group',
				'option_name' => 'api_key'
			)
		);

		$this->settings->setSettings($args);
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'news_admin_index',
				'title' => 'Settings',
				'callback' => array($this->callbacks, 'newsAdminSection'),
				'page' => 'gnews_plugin'
			)
		);

		$this->settings->setSections($args);
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'api_key',
				'title' => 'Api Key',
				'callback' => array($this->callbacks, 'apiKey'),
				'page' => 'gnews_plugin',
				'section' => 'news_admin_index',
				'args' => array(
					'label_for' => 'api_key',
					'class' => 'example-class'
				)
			)
		);

		$this->settings->setFields($args);
	}
}
