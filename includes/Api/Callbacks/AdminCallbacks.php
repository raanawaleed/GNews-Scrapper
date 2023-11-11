<?php

/**
 * @package CustomNewsScraper
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;
use WP_Query;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/home.php");
    }

    public function newsOptionsGroup( $input )
	{
		return $input;
	}

    public function newsAdminSection()
	{
		echo 'Check this beautiful section!';
	}

	public function apiKey()
	{
		$value = esc_attr( get_option( 'api_key' ) );
		echo '<input type="text" class="regular-text" name="api_key" value="' . $value . '" placeholder="Write your Api key">';
	}
}
