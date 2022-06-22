<?php

/**
 * Fired during plugin activation
 *
 * @link       www.sajjadcodes.com
 * @since      1.0.0
 *
 * @package    Edumel_Api
 * @subpackage Edumel_Api/admin
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Edumel_Api
 * @subpackage Edumel_Api/admin
 * @author     Sajad Hussain <Sajjadcodes@gmail.com>
 */
class Edumel_Api_Cpts {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        
       
	}

    public function __construct() {
        add_action( 'init', [$this ,'edumel_api_course_init'] );
    }
    /**
 * Register a custom post type called "course".
 *
 * @see get_post_type_labels() for label keys.
 */
function edumel_api_course_init() {
    $labels = array(
        'name'                  => _x( 'Courses', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Course', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Courses', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Course', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Course', 'textdomain' ),
        'new_item'              => __( 'New Course', 'textdomain' ),
        'edit_item'             => __( 'Edit Course', 'textdomain' ),
        'view_item'             => __( 'View Course', 'textdomain' ),
        'all_items'             => __( 'All Courses', 'textdomain' ),
        'search_items'          => __( 'Search Courses', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Courses:', 'textdomain' ),
        'not_found'             => __( 'No courses found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No courses found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Course Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Course archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into course', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this course', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter courses list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Courses list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Courses list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'course' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        'show_in_rest'       =>true,
        'rest_base'          =>'courses',
        'menu_icon'          =>'dashicons-book-alt'
    );
 
    register_post_type( 'course', $args );
}

    


}









 
