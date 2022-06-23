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
class Edumel_Api_Custom_Route {

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
    add_action( 'rest_api_init',[$this,'edumal_api_route_init']);
}
    

public function edumal_api_route_init() {
    // options page route
	register_rest_route( 'edumel/v1','optionspage', array(
	  'methods' => 'GET',
	  'callback' => [$this, 'edumel_api_options_page_cb'],
	) );
    // Homepage route 
	register_rest_route( 'edumel/v1','homepage', array(
		'methods' => 'GET',
		'callback' => [$this, 'edumel_api_home_page_cb'],
	  ) );
    //Courses  
    register_rest_route('edumel/v1','courseslist',array(
        'methods'   => 'GET',
        'callback'  => [$this, 'edumel_api_coursesList_cb']
    ));
    // Courses category
    register_rest_route('edumel/v1', 'coursescategory', array(
        'method'    => 'GET',
        'callback'  => [$this, 'edumel_api_course_categories_cb']
    ));

    // instructors
    register_rest_route('edumel/v1', 'instructorslist', array(
        'methods'       => 'GET',
        'callback'      =>[$this, 'edumel_api_instructors_cb'] 
    ));
  }


public function edumel_api_options_page_cb() {
	$options_page = array(
		'header_bar'			=> array(
			'address'		=> get_field('address', 'option'),
			'social_icon' 	=> get_field('social_icons', 'option'),
		),
		'main_menu'	=> wp_get_nav_menu_items('main_menu'),
		'footer'				=> array(
			'copy_right'	=> 'copyright Text',
			'developed_by'	=> 'Revnix Technologies',
			'footer_menu'	=> wp_get_nav_menu_items('footer_menu')
		),
	);

	return $options_page;
}

public function edumel_api_home_page_cb() {
	
	return 'Congraluations';
}

public function edumel_api_coursesList_cb() {

    return 'Courses list custom route';
}

public function edumel_api_course_categories_cb() {

    return 'Course categories.!';
}

public function edumel_api_instructors_cb() {

    return 'This is instructors custom route';
}

}
