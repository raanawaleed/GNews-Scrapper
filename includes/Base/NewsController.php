<?php
/**
 * @package CustomNewsScraper
 */
namespace Inc\Base;

class NewsController
{
	public function register(){
		add_action('init', array($this, 'news_init'));
	}

	function news_init(){
		$labels = array(
			'name'               => _x( 'News', 'post type general name', 'custom_news' ),
			'singular_name'      => _x( 'News', 'post type singular name', 'custom_news' ),
			'menu_name'          => _x( 'News', 'admin menu', 'custom_news' ),
			'name_admin_bar'     => _x( 'News', 'add new on admin bar', 'custom_news' ),
			'add_new'            => _x( 'Add New News', 'News', 'custom_news' ),
			'add_new_item'       => __( 'Add New News', 'custom_news' ),
			'new_item'           => __( 'New News', 'custom_news' ),
			'edit_item'          => __( 'Edit News', 'custom_news' ),
			'view_item'          => __( 'View News', 'custom_news' ),
			'all_items'          => __( 'All News', 'custom_news' ),
			'search_items'       => __( 'Search News', 'custom_news' ),
			'parent_item_colon'  => __( 'Parent News:', 'custom_news' ),
			'not_found'          => __( 'No News found.', 'custom_news' ),
			'not_found_in_trash' => __( 'No News found in Trash.', 'custom_news' ),
		);
		$args = array(
			'labels' => $labels,
			'rewrite' => array( 'slug' => 'news' ),
			'public' => true,
			'show_in_rest' => true,
			'rest_base'    => 'news',
			'has_archive' => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'taxonomies'         => [ 'position-type' ],
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports' => [ 'title', 'editor', 'excerpt', 'revisions', 'thumbnail', 'author']
		);

		register_post_type( 'custom_news', $args );
	}

}
