<?php
/*
* Plugin Name: Apple Map embed
* Plugin URI: https://github.com/mattradford/apple-map-embed
* Description: Demo plugin to embed an Apple map on your website
* Version: 1.0.1
* Author: Matt Radford
* Author URI: https://mattrad.uk
* Text Domain: mapkit_jwt
*/
define( 'MAPKIT_JS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'MAPKIT_JS_URL', plugin_dir_url( __FILE__ ) );
require_once( MAPKIT_JS_PLUGIN_PATH . 'admin/JWT.php');
require_once( MAPKIT_JS_PLUGIN_PATH . 'admin/mapkit-jwt-settings.php');
require_once( MAPKIT_JS_PLUGIN_PATH . 'admin/mapkit-jwt-token.php');

function mapkit_js_enqueue() {
    wp_enqueue_script( 'mapkit', 'https://cdn.apple-mapkit.com/mk/5.x.x/mapkit.js', null, null, true);
    wp_register_script( 'applemap', MAPKIT_JS_URL . 'inc/map.js', null, null, true);
    
    $mapkit_jwt_data = array(
        'mapkit_jwt_token' => get_option( 'mapkit_jwt_token' ),
    );
    wp_localize_script( 'applemap', 'mapkit_vars', $mapkit_jwt_data );
    
    wp_enqueue_script( 'applemap' );
}
add_action( 'wp_enqueue_scripts', 'mapkit_js_enqueue' );

function mapkit_js_shortcode() {
    return '<style>#map {width: 100%;height: 600px;}</style><div id="map"></div>';
}
add_shortcode('applemap', 'mapkit_js_shortcode');