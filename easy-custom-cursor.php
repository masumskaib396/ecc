<?php 
/*
Plugin Name: Easy Custom Cursor 
Plugin URI: https://github.com/masumskaib396/ecc
Description: Using Easy Custom Cursor  Custom Cursor for customize your website cursor or mouse pointer, you will get a very elegant and unique site. You can change colors, selectors etc from this settings page.
Version: 1.0.0
Author: wpgrids
Author URI: https://profiles.wordpress.org/wpgrids/
License: GPLv2 or later
Text Domain: ecc
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
//hellow world
//Set plugin version constant.
define( 'ECC_VERSIONS', '1.0.0');

/* Set constant path to the plugin directory. */
define( 'ECC_DIRCETORY_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );

// Plugin Function Folder Path
define( 'ECC_INC', plugin_dir_path( __FILE__ ) . 'includes/' );


// Assets Folder Frontend
define( 'ECC_ASSETS_PUBLIC', plugins_url( 'assets/frontend', __FILE__ ) );

// Assets Folder Admin
define( 'ECC_ASSETS_ADMIN', plugins_url( 'assets/admin', __FILE__ ) );   


require_once(ECC_INC . 'View/Coursor.php');
require_once(ECC_INC . 'Assets.php');
require_once(ECC_INC . 'Init.php');

?>
