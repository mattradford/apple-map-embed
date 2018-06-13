<?php

use Mapkit\JWT;

function mapkitJwtToken() {


    $options = get_option( 'mapkit_jwt_settings' );

    $private_key = trim($options['mapkit_jwt_textarea_field_2']);
    $key_id = $options['mapkit_jwt_text_field_1'];
    $team_id = $options['mapkit_jwt_text_field_0'];
    $origin = $options['mapkit_jwt_text_field_3'];



    // Replace arguments below with private key, key ID and team identifier
    if ( isset( $origin ) ) {
        $my_token = JWT::getToken($private_key, $key_id, $team_id, $origin);
    } else {
        $my_token = JWT::getToken($private_key, $key_id, $team_id);
    }

    if ( isset($my_token) ) {
        update_option( 'mapkit_jwt_token', $my_token, true );
    }

}