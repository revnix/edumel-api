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
class Edumel_Api_Texonomy {

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
        add_action( 'init', [$this,'edumel_api_category_init']);
       
    }
    /**
 * Add new taxonomy, make it hierarchical (like categories)
 *
 *
 */
function edumel_api_category_init() {
    // 
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name', 'edumel-api' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name', 'edumel-api' ),
        'search_items'      => __( 'Search Categories', 'edumel-api' ),
        'all_items'         => __( 'All Categories', 'edumel-api' ),
        'parent_item'       => __( 'Parent Category', 'edumel-api' ),
        'parent_item_colon' => __( 'Parent Category:', 'edumel-api' ),
        'edit_item'         => __( 'Edit Category', 'edumel-api' ),
        'update_item'       => __( 'Update Category', 'edumel-api' ),
        'add_new_item'      => __( 'Add New Category', 'edumel-api' ),
        'new_item_name'     => __( 'New Category Name', 'edumel-api' ),
        'menu_name'         => __( 'Category', 'edumel-api' ),
    );
 
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'category' ),
        'show_in_rest'      =>true,
        'rest_base'         =>'course-categories'
    );
 
    register_taxonomy( 'category', array( 'course' ), $args );
}
// hook into the init action and call create_book_taxonomies when it fires

    


}


