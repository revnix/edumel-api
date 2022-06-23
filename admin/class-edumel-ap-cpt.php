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
        add_action( 'init', [$this ,'edumel_api_instructor_init'] );
        add_action( 'init', [$this ,'edumel_api_review_init'] );
    }
    /**
 * Register a custom post type called "course".
 *
 * @see get_post_type_labels() for label keys.
 */
function edumel_api_course_init() {
    $labels = array(
        'name'                  => _x( 'Courses', 'Post type general name', 'edumel-api' ),
        'singular_name'         => _x( 'Course', 'Post type singular name', 'edumel-api' ),
        'menu_name'             => _x( 'Courses', 'Admin Menu text', 'edumel-api' ),
        'name_admin_bar'        => _x( 'Course', 'Add New on Toolbar', 'edumel-api' ),
        'add_new'               => __( 'Add New', 'edumel-api' ),
        'add_new_item'          => __( 'Add New Course', 'edumel-api' ),
        'new_item'              => __( 'New Course', 'edumel-api' ),
        'edit_item'             => __( 'Edit Course', 'edumel-api' ),
        'view_item'             => __( 'View Course', 'edumel-api' ),
        'all_items'             => __( 'All Courses', 'edumel-api' ),
        'search_items'          => __( 'Search Courses', 'edumel-api' ),
        'parent_item_colon'     => __( 'Parent Courses:', 'edumel-api' ),
        'not_found'             => __( 'No courses found.', 'edumel-api' ),
        'not_found_in_trash'    => __( 'No courses found in Trash.', 'edumel-api' ),
        'featured_image'        => _x( 'Course Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'edumel-api' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'edumel-api' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'edumel-api' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'edumel-api' ),
        'archives'              => _x( 'Course archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'edumel-api' ),
        'insert_into_item'      => _x( 'Insert into course', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'edumel-api' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this course', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'edumel-api' ),
        'filter_items_list'     => _x( 'Filter courses list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'edumel-api' ),
        'items_list_navigation' => _x( 'Courses list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'edumel-api' ),
        'items_list'            => _x( 'Courses list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'edumel-api' ),
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

// Instructor CPT

function edumel_api_instructor_init() {
    $labels = array(
        'name'                  => _x( 'Instructors', 'Post type general name', 'edumel-api' ),
        'singular_name'         => _x( 'Instructor', 'Post type singular name', 'edumel-api' ),
        'menu_name'             => _x( 'Instructors', 'Admin Menu text', 'edumel-api' ),
        'name_admin_bar'        => _x( 'Instructor', 'Add New on Toolbar', 'edumel-api' ),
        'add_new'               => __( 'Add New', 'edumel-api' ),
        'add_new_item'          => __( 'Add New Instructor', 'edumel-api' ),
        'new_item'              => __( 'New Instructor', 'edumel-api' ),
        'edit_item'             => __( 'Edit Instructor', 'edumel-api' ),
        'view_item'             => __( 'View Instructor', 'edumel-api' ),
        'all_items'             => __( 'All Instructors', 'edumel-api' ),
        'search_items'          => __( 'Search Instructors', 'edumel-api' ),
        'parent_item_colon'     => __( 'Parent Instructors:', 'edumel-api' ),
        'not_found'             => __( 'No Instructors found.', 'edumel-api' ),
        'not_found_in_trash'    => __( 'No Instructors found in Trash.', 'edumel-api' ),
        'featured_image'        => _x( 'Instructor Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'edumel-api' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'edumel-api' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'edumel-api' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'edumel-api' ),
        'archives'              => _x( 'Instructor archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'edumel-api' ),
        'insert_into_item'      => _x( 'Insert into Instructor', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'edumel-api' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Instructor', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'edumel-api' ),
        'filter_items_list'     => _x( 'Filter Instructors list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'edumel-api' ),
        'items_list_navigation' => _x( 'Instructors list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'edumel-api' ),
        'items_list'            => _x( 'Instructors list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'edumel-api' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'instructor' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'       =>true,
        'rest_base'          =>'instructors',
        'menu_icon'          =>'dashicons-businessperson'
    );
 
    register_post_type( 'instructor', $args );
}
 
// reviews CPT

function edumel_api_review_init() {
    $labels = array(
        'name'                  => _x( 'Reviews', 'Post type general name', 'edumel-api' ),
        'singular_name'         => _x( 'Review', 'Post type singular name', 'edumel-api' ),
        'menu_name'             => _x( 'Reviews', 'Admin Menu text', 'edumel-api' ),
        'name_admin_bar'        => _x( 'Review', 'Add New on Toolbar', 'edumel-api' ),
        'add_new'               => __( 'Add New', 'edumel-api' ),
        'add_new_item'          => __( 'Add New Review', 'edumel-api' ),
        'new_item'              => __( 'New Review', 'edumel-api' ),
        'edit_item'             => __( 'Edit Review', 'edumel-api' ),
        'view_item'             => __( 'View Review', 'edumel-api' ),
        'all_items'             => __( 'All Reviews', 'edumel-api' ),
        'search_items'          => __( 'Search Reviews', 'edumel-api' ),
        'parent_item_colon'     => __( 'Parent Reviews:', 'edumel-api' ),
        'not_found'             => __( 'No Reviews found.', 'edumel-api' ),
        'not_found_in_trash'    => __( 'No Reviews found in Trash.', 'edumel-api' ),
        'featured_image'        => _x( 'Review Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'edumel-api' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'edumel-api' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'edumel-api' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'edumel-api' ),
        'archives'              => _x( 'Review archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'edumel-api' ),
        'insert_into_item'      => _x( 'Insert into Review', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'edumel-api' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Review', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'edumel-api' ),
        'filter_items_list'     => _x( 'Filter Reviews list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'edumel-api' ),
        'items_list_navigation' => _x( 'Reviews list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'edumel-api' ),
        'items_list'            => _x( 'Reviews list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'edumel-api' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Review' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt'),
        'show_in_rest'       =>true,
        'rest_base'          =>'Reviews',
        'menu_icon'          =>'dashicons-star-half'
    );
 
    register_post_type( 'review', $args );
}


}









 
