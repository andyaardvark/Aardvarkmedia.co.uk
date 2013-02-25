<?php
	/**
	 * @package WordPress
	 * @subpackage themename
	 */





/**
 * am_register_postsInGrid
 * ----------------------------------------------
 * registers bew setting in WP's Reading Panel
 */

	function am_register_postsInGrid(){
		register_setting(
			'reading', // settings page
			'am_options', // option name
			'am_validate_posts_in_grid' // validation callback
		);

		add_settings_field(
			'am_visible_posts_in_grid', // id
			'Posts in Grid', // setting title
			'am_visible_posts_in_grid_input', // display callback
			'reading', // settings page
			'default' // settings section
		);

	}
	add_action('admin_init', 'am_register_postsInGrid');









/**
 * am_visible_posts_in_grid_input
 * ----------------------------------------------
 * renders Input field for the setting
 */

function am_visible_posts_in_grid_input(){
	$options  = get_option('am_options');
	$value    = esc_attr( $options['am_visible_posts_in_grid'] )?:8;
	?>
		<input  id='am_visible_posts_in_grid' name='am_options[am_visible_posts_in_grid]'
		        class="small-text"
		        type="number"
		        min="1"
		        step="1"
		        type='text'
		        value='<?php echo $value; ?>' />
		Amount of items visible by default in Our Work listing section
	<?php
}








/**
 * am_validate_posts_in_grid
 * ----------------------------------------------
 * validates the setting field and throws an error if needed.
 *
 * @param string $input value of the setting input field
 * @return validated value
 */

function am_validate_posts_in_grid($input){
	$valid = array('am_visible_posts_in_grid' => $input['am_visible_posts_in_grid']);

	// Something dirty entered? Warn user.
	if($valid['am_visible_posts_in_grid'] < 1){
		add_settings_error(
			'am_options_am_visible_posts_in_grid',  // setting title
			'am_texterror',                         // error ID
			'Enter integers larger than 0',         // error message
			'error'                                 // type of message
		);
	}

	return $valid;
}





/**
 * adminMenu_shifting
 * --------------------------------------------
 */

function adminMenu_shifting(){

	global $menu;

	$menu[19] = $menu[10];  // Copy Media from position 10 to position 19
	unset($menu[10]);       // Unset Media (from original position)

	$menu[10] = $menu[20];  // Copy Pages from position 20 to position 10
	unset($menu[20]);       // Unset Pages (from original position)

	$menu[15] = Array('', 'read', 'separator-custom-post-types', '', 'wp-menu-separator');
	ksort($menu);

}

add_action('admin_head', 'adminMenu_shifting');













function remove_menus () {
	global $menu;

	$restricted = array(__('Posts'), __('Links'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}

//add_action('admin_menu', 'remove_menus');