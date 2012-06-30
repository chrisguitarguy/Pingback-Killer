<?php
/*
Plugin Name: Pingback Killer
Plugin URI: http://pmg.co/pingback-killer
Description: Kill all trackbacks/pingbacks on your WordPress blog.
Version: 1.0
Author: Christopher Davis
Author URI: http://pmg.co/people/chris
*/

// Kill the X-Pingback header
add_filter( 'wp_headers', 'pmg_pk_filter_headers', 10, 1 );
function pmg_pk_filter_headers( $headers )
{
	if( isset( $headers['X-Pingback'] ) )
	{
		unset( $headers['X-Pingback'] );
	}
	return $headers;
}

// Kill the rewrite rules
add_filter( 'rewrite_rules_array', 'pmg_pk_filter_rewrites' );
function pmg_pk_filter_rewrites( $rules )
{
	foreach( $rules as $rule => $rewrite )
	{
		if( preg_match( '/trackback\/\?\$$/i', $rule ) )
		{
			unset( $rules[$rule] );
		}
	}
	return $rules;
}

// Kill bloginfo( 'pingback_url' )
add_filter( 'bloginfo_url', 'pmg_pk_kill_pingback_url', 10, 2 );
function pmg_pk_kill_pingback_url( $output, $show )
{
	if( $show == 'pingback_url' )
	{
		$output = '';
	}
	return $output;
}

// hijack options for pingbacks
add_filter( 'pre_update_default_ping_status', '__return_false' );
add_filter( 'pre_option_default_ping_status', '__return_zero' );
add_filter( 'pre_update_default_pingback_flag', '__return_false' );
add_filter( 'pre_option_default_pingback_flag', '__return_zero' );

// Disable XMLRPC call
add_action( 'xmlrpc_call', 'pmg_pk_kill_xmlrpc' );
function pmg_pk_kill_xmlrpc( $action )
{
	if( 'pingback.ping' === $action )
	{
		wp_die( 
			__( 'Pingbacks are not supported' ), 
			__( 'Not Allowed!' ), 
			array( 'response' => 403 )
		);
	}
}

// Flush rewrite rules on activation/deactivation so our trackback
// rules disappear or reappear on deactivation.
register_activation_hook( __FILE__ , 'flush_rewrite_rules' );
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );