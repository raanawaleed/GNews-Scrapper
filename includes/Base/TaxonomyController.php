<?php
/**
 * @package CustomNewsScraper
 */
namespace Inc\Base;
use Inc\Api\Callback\AdminCallbacks;


class TaxonomyController extends BaseController
{
	public AdminCallbacks $callbacks;

	public function register(){
		$this->callbacks = new AdminCallbacks();
		add_action( 'init', array($this, 'custom_taxonomy'));
		// add_action( 'init', array($this, 'gated_taxonomy'));
	}

	function custom_taxonomy() {

		$labels = array(
			'name'                       => _x( 'Topics', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Topic', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Topics', 'text_domain' ),
			'all_items'                  => __( 'All Topics', 'text_domain' ),
			'parent_item'                => __( 'Parent Topic', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Topic:', 'text_domain' ),
			'new_item_name'              => __( 'New Topic Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Topic', 'text_domain' ),
			'edit_item'                  => __( 'Edit Topic', 'text_domain' ),
			'update_item'                => __( 'Update Topic', 'text_domain' ),
			'view_item'                  => __( 'View Topic', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate topics with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove topics', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used topics', 'text_domain' ),
			'popular_items'              => __( 'Popular Topics', 'text_domain' ),
			'search_items'               => __( 'Search Topics', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No topics', 'text_domain' ),
			'items_list'                 => __( 'Topics list', 'text_domain' ),
			'items_list_navigation'      => __( 'Topics list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
			'rewrite'                    => array( 'slug' => 'topics' ),
		);
		register_taxonomy( 'category', array( 'post', 'apdg_download', 'apdg_video' ), $args );

		// Pain Points Taxonomy
		$pain_point_labels = array(
			'name'                       => _x( 'Pain Points', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Pain Point', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Pain Points', 'text_domain' ),
			'all_items'                  => __( 'All Pain Points', 'text_domain' ),
			'parent_item'                => __( 'Parent Pain Point', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Pain Point:', 'text_domain' ),
			'new_item_name'              => __( 'New Pain Point Name', 'text_domain' ),
			'add_new_item'               => __( 'Add New Pain Point', 'text_domain' ),
			'edit_item'                  => __( 'Edit Pain Point', 'text_domain' ),
			'update_item'                => __( 'Update Pain Point', 'text_domain' ),
			'view_item'                  => __( 'View Pain Point', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate pain points with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove pain points', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used pain points', 'text_domain' ),
			'popular_items'              => __( 'Popular Pain Points', 'text_domain' ),
			'search_items'               => __( 'Search Pain Points', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No pain points', 'text_domain' ),
			'items_list'                 => __( 'Pain Points list', 'text_domain' ),
			'items_list_navigation'      => __( 'Pain Points list navigation', 'text_domain' ),
		);
		$pain_point_args = array(
			'labels'                     => $pain_point_labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
			'rewrite'                    => array( 'slug' => 'pain_points' ),
		);
		register_taxonomy( 'pain_points', array( 'post', 'apdg_download', 'apdg_video' ), $pain_point_args );


	}

	function gated_taxonomy() {

		$labels = array(
			'name'                       => _x( 'Gated Content', 'Taxonomy General Name', 'text_domain' ),
			'singular_name'              => _x( 'Gated Content', 'Taxonomy Singular Name', 'text_domain' ),
			'menu_name'                  => __( 'Gated Content', 'text_domain' ),
			'search_items'               => __( 'Search Gated Content', 'textdomain' ),
			'popular_items'              => __( 'Popular Gated Content', 'textdomain' ),
			'all_items'                  => __( 'All Gated Content', 'textdomain' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Gated Content', 'textdomain' ),
			'update_item'                => __( 'Update Gated Content', 'textdomain' ),
			'add_new_item'               => __( 'Add New Gated Content', 'textdomain' ),
			'new_item_name'              => __( 'New Gated Content Name', 'textdomain' ),
			'add_or_remove_items'        => __( 'Add or remove Gated Content', 'textdomain' ),
			'not_found'                  => __( 'No Gated Content found.', 'textdomain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
		);
		$post_types = ['post', 'apdg_download', 'apdg_video', 'apdg_case_study'];
		register_taxonomy( 'resource-gated', $post_types, $args );
	}
}
