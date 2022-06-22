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
class Edumel_Api_Options_Page {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        acf_add_options_page(array(
            'page_title' 	=> 'Theme General Settings',
            'menu_title'	=> 'Site Settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));
        
        acf_add_options_sub_page(array(
            'page_title' 	=> 'Theme Header Settings',
            'menu_title'	=> 'Header',
            'parent_slug'	=> 'theme-general-settings',
        ));
        
        acf_add_options_sub_page(array(
            'page_title' 	=> 'Theme Footer Settings',
            'menu_title'	=> 'Footer',
            'parent_slug'	=> 'theme-general-settings',
        ));

	}

    


}
