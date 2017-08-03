<?php
/*
Plugin Name: Frontier Restrict Backend
Plugin URI: http://wordpress.org/extend/plugins/frontier-restrict-backend
Description: Restrict non-admin users from accessing the backend (admin area)
Author: finnj
Version: 1.3.0
Author URI: http://wpfrontier.com
*/

define('FRONTIER_RESTRICT_BACKEND_VERSION', "1.3.0"); 
define('FRONTIER_RESTRICT_BACKEND_DIR', dirname( __FILE__ )); //an absolute path to this directory

$fprb_roles_caps = array(
	'manage_options' 	=> __("Administrators", "frontier-post"),
	'edit_others_posts' => __("Editors", "frontier-post"),
	'publish_posts' 	=> __("Authors", "frontier-post"),
	'edit_posts' 		=> __("Contributors", "frontier-post"),
	'read' 				=> __("Subscribers", "frontier-post"),
	);
	

//Restrict users who dont have capability manage_options to access the admin area
function frontier_restrict_backend($query) 
	{
	if ( is_admin() )
		{
		
		
		// exit if doing Ajax
		if (defined( 'DOING_AJAX' ) && DOING_AJAX )
			return;
	
		if (strpos( $_SERVER[ 'REQUEST_URI' ], 'wp-admin/admin-ajax.php' ) !== false)
        	return;
       
		
		// exit if media upload is in process
		if (strpos( $_SERVER[ 'REQUEST_URI' ], 'wp-admin/media-upload.php' ) !== false)
        	return;
        
        if (strpos( $_SERVER[ 'REQUEST_URI' ], 'wp-admin/async-upload.php' ) !== false)
        	return;
        
        //error_log("restrict caller: ".$_SERVER[ 'REQUEST_URI' ]);
		
        
		// Define capabilities allowed to cotrol restrict backend. 
		$frb_access_roles 	= array('manage_options' , 'edit_others_posts' , 'publish_posts' , 'edit_posts' , 'read');
		$frb_min_cap 		= 'manage_options';
		
		//****************************************************************************************************
		// Apply filter to allow admins to change anccess level from functions php. 
		//****************************************************************************************************		
		
		$frb_min_cap = apply_filters( 'restrict_backend_min_cap', $frb_min_cap );
		
		if ( empty($frb_min_cap) || !in_array($frb_min_cap, $frb_access_roles) )
			{
			//error_log("Restrict Backend - Illegal cap returned from filter: ".$frb_min_cap);
			$frb_min_cap = 'manage_options';
			}
		
    	if (  !current_user_can( $frb_min_cap) )
    		{
    		//error_log("exit restrict");
        	wp_redirect( home_url() );
        	exit;
        	}
        }
    }
add_action( 'init', 'frontier_restrict_backend' );
?>