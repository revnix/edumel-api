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

	register_rest_route('edumel/v1', 'reviews',array(

	'methods'		=> 'GET',
	'callback'		=>[$this,'edumel_api_reviews_cb'],
		
	));

	// Search route
	register_rest_route('edumel/v1', 'search',array(
		'methods'		=> WP_REST_SERVER::READABLE,
		'callback'		=>[$this,'edumel_api_search_cb'], 		
	));
  }

// Callbacks

public function edumel_api_options_page_cb() {
	$options_page = array(
		'header_bar'			=> array(
			'address'		=> get_field('address', 'option'),
			'social_icon' 	=> get_field('social_icons', 'option'),
		),
		'main_menu'	=> wp_get_nav_menu_items('main_menu'),
		'footer'				=> array(
			'copy_right'	=>'' ,
			'developed_by'	=>'',
			'footer_menu'	=> wp_get_nav_menu_items('footer_menu')
		),
	);

	if (empty($options_page)) {
	return new WP_Error( 'empty_options_page', 'There is not options settings', array('status' => 404) );
	}
	$response = new WP_REST_Response($options_page);
	$response->set_status(200);
	return $response;	
}

public function edumel_api_home_page_cb() {
	
	$homepage = array();

	if(empty($options_page)){
		return new WP_Error('Empty_home_page', 'There is no content avialable for homepage', array('status' => 404));
	}
	$response = new WP_REST_Response($options_page);
	$response->set_status(200);
	return $response;
}

public function edumel_api_coursesList_cb() {

    $courses = array(
		
	);

	if(empty($courses)) {
		return new WP_Error('No_course', 'There is no course avialable for now', array('status'=>404));
	}
	$response = new WP_REST_Response($courses);
	$response->set_status(200);
	return $response;
}

public function edumel_api_course_categories_cb() {

    $course_categories = array();

	if(empty($course_categories)) {
		return new WP_Error('No_Course_category', 'There is no course category found', array('status' => 404));
	}

	$response = new WP_REST_Response($course_categories);
	$response->set_status(200);
	return $response;
}

public function edumel_api_instructors_cb() {

    $instructors = array('There are hundreds of instructors registered');

	if(empty($instructors)){
		return new WP_Error('No_Instructors', 'No instructors avialable now', array('status' => 404));
	}

	$response = new WP_REST_Response($instructors);
	$response->set_status(200);
	return $response;


}

// reviews ap cb

public function edumel_api_reviews_cb() {

	$meta = array(
		'name'	=> 'reviews'
	);
	$reviews = array(

	);
	$res = $this->data_validation($meta,$reviews);
	return $res;
}

// search api cb
public function edumel_api_search_cb($data) {

	$meta = array(
		'name'		=>'Search'
	);
	$arg = array(
		'post_type'		=>array('page','post', 'course', 'instructor'),
		's'				=>$data['term']
	);
	$searchQuery = new WP_Query($arg);
	$results = array();	
	while($searchQuery->have_posts()) {
		$searchQuery->the_post();
		array_push($results,array(
			'title'			=> get_the_title(),
			'permalink'		=> get_the_permalink(),
			'postType'		=> get_post_type(),
		));
	}

	$res = $this->data_validation($meta, $result);
	return $res;
}

public function data_validation($meta,$data){
	
	if(empty($data)){
		return new WP_Error("NO_{$meta['name']}_exist", "There is no {$meta['name']} found", array('status' => 404));
	}
	$response = new WP_REST_Response($data);
	$response->set_status(200);
	return $response;
}



}
