<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
 
$mapkit_jwt_token_option = 'mapkit_jwt_token';
$mapkit_jwt_settings_option = 'mapkit_jwt_settings';
 
delete_option($mapkit_jwt_token_option);
delete_option($mapkit_jwt_settings_option);