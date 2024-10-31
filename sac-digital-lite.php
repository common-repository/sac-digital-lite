<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://sac.digital
 * @since             1.0.0
 * @package           Sac_Digital_Lite
 *
 * @wordpress-plugin
 * Plugin Name:       SAC Digital Lite
 * Plugin URI:        http://lite.sac.digital
 * Description:       A melhor plataforma pra aumentar a qualidade dos seus atendimentos.
 * Version:           1.0.0
 * Author:            SAC DIGITAL
 * Author URI:        http://sac.digital
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sac-digital-lite
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SAC_DIGITAL_LITE', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sac-digital-lite-activator.php
 */
function activate_sac_digital_lite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sac-digital-lite-activator.php';
	Sac_Digital_Lite_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sac-digital-lite-deactivator.php
 */
function deactivate_sac_digital_lite() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sac-digital-lite-deactivator.php';
	Sac_Digital_Lite_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sac_digital_lite' );
register_deactivation_hook( __FILE__, 'deactivate_sac_digital_lite' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sac-digital-lite.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sac_digital_lite() {

	$plugin = new Sac_Digital_Lite();
	$plugin->run();

}
run_sac_digital_lite();
