<?php

/**
 * @package CustomNewsScraper
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/home.php");
    }

    public function newsOptionsGroup($input)
    {
        return $input;
    }

    public function newsAdminSection()
    {
        echo 'Check this beautiful section!';
    }

    public function apiKey()
    {
        $value = esc_attr(get_option('api_key'));
        echo '<input type="text" class="regular-text" name="api_key" value="' . $value . '" placeholder="Write your Api key">';
    }

    function scrape_and_update_news()
    {
        //  API call, news scraping, and post creation logic here

        $api_key = get_option('api_key');

        // Initialize cURL for making the API request

        $url = "https://gnews.io/api/v4/search?q=america&lang=en&country=us&max=10&apikey=$api_key";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch), true);
        curl_close($ch);

        if (empty($data)) {
            echo 'Error: No news data retrieved from the API.';
            wp_die(); // Terminate the AJAX response
        }
        $articles = $data['articles'];

        for ($i = 0; $i < count($articles); $i++) {
            // articles[i].title
            $news_title = $articles[$i]['title'];
            $news_content = $articles[$i]['description'];

            // Create a new post in the "News" custom post type
            $news_post = array(
                'post_title' => $news_title,
                'post_content' => $news_content,
                'post_status' => 'publish',
                'post_type' => 'custom_news',
            );

            $post_id = wp_insert_post($news_post);
        }

        
        wp_die(); // This is required to terminate the AJAX response
    }
}
