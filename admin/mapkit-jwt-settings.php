<?php
add_action( 'admin_menu', 'mapkit_jwt_add_admin_menu' );
add_action( 'admin_init', 'mapkit_jwt_settings_init' );
function mapkit_jwt_add_admin_menu() {
	add_submenu_page( 'tools.php', 'Apple Map embed', 'Apple Map embed', 'manage_options', 'mapkit_jwt_generator', 'mapkit_jwt_options_page' );
}
function mapkit_jwt_settings_init() {
	register_setting( 'pluginPage', 'mapkit_jwt_settings' );
	add_settings_section(
		'mapkit_jwt_pluginPage_section', 
		__( '', 'mapkit_jwt' ), 
		'mapkit_jwt_settings_section_callback', 
		'pluginPage'
	);
	add_settings_field(
		'mapkit_jwt_text_field_0', 
		__( 'Team ID', 'mapkit_jwt' ), 
		'mapkit_jwt_text_field_0_render', 
		'pluginPage', 
		'mapkit_jwt_pluginPage_section' 
	);
	add_settings_field(
		'mapkit_jwt_text_field_1', 
		__( 'Key ID', 'mapkit_jwt' ), 
		'mapkit_jwt_text_field_1_render', 
		'pluginPage', 
		'mapkit_jwt_pluginPage_section' 
	);
	add_settings_field(
		'mapkit_jwt_textarea_field_2', 
		__( 'Private Key', 'mapkit_jwt' ), 
		'mapkit_jwt_textarea_field_2_render', 
		'pluginPage', 
		'mapkit_jwt_pluginPage_section' 
	);
    add_settings_field(
		'mapkit_jwt_text_field_3', 
		__( 'Origin', 'mapkit_jwt' ), 
		'mapkit_jwt_text_field_3_render', 
		'pluginPage', 
		'mapkit_jwt_pluginPage_section' 
	);
}
function mapkit_jwt_text_field_0_render() {
	$options = get_option( 'mapkit_jwt_settings' );
	?>
	<input type='text' name='mapkit_jwt_settings[mapkit_jwt_text_field_0]' value='<?php echo sanitize_text_field( $options['mapkit_jwt_text_field_0'] ); ?>'>
	<?php
}
function mapkit_jwt_text_field_1_render() {
	$options = get_option( 'mapkit_jwt_settings' );
	?>
	<input type='text' name='mapkit_jwt_settings[mapkit_jwt_text_field_1]' value='<?php echo sanitize_text_field( $options['mapkit_jwt_text_field_1'] ); ?>'>
	<?php
}
function mapkit_jwt_textarea_field_2_render() {
	$options = get_option( 'mapkit_jwt_settings' );
	?>
	<textarea cols='40' rows='10' name='mapkit_jwt_settings[mapkit_jwt_textarea_field_2]'><?php echo sanitize_textarea_field( trim($options['mapkit_jwt_textarea_field_2']) ); ?></textarea>
	<?php
}
function mapkit_jwt_text_field_3_render() {
	$options = get_option( 'mapkit_jwt_settings' );
	?>
	<input type='text' name='mapkit_jwt_settings[mapkit_jwt_text_field_3]' value='<?php echo sanitize_text_field( $options['mapkit_jwt_text_field_3'] ); ?>'>
	<?php
}
function mapkit_jwt_settings_section_callback() {
	return mapkit_jwt_settings_section_render();
}
function mapkit_jwt_settings_section_render() {
    ?>
	<p><?php _e('Add your Apple Developer Team ID, Key ID and Private Key. A new JSON Web Token will be generated everytime you click "Generate token". This token will have a lifespan of 10 years.', 'mapkit_jwt');?></p>
    <p><?php _e('I <strong>strongly</strong> advise also setting an origin so that others cannot use your JWT, which is the equivalent of a username and password to access Mapkit JS services.', 'mapkit_jwt');?></p>
    <p><?php _e('Test using the shortcode <code>[applemap]</code>. You can change parameters of the map in <code>inc/map.js</code>.', 'mapkit_jwt');?></p>
    <?php
}
function mapkit_jwt_options_page() {
	?>
	<form action='options.php' method='post'>
		<h2><?php _e('Apple Map embed settings','mapkit_jwt');?></h2>
		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
        submit_button('Generate token');
        mapkitJwtToken();
		?>
	</form>
	<?php
}