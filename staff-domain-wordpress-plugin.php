<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name: Staff Domain - WordPress Custom Plugin
 * Description: This is for Staff Domain - Task A - WordPress Custom Plugin
 * Version: 1.0.0
 * Author: Junmar Jose
 * Author URI: https://github.com/jnmrclmbsjse
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

include_once __DIR__.'/autoload.php';

use StaffDomainWordpressPlugin\Activator;
use StaffDomainWordpressPlugin\Core;
use StaffDomainWordpressPlugin\Deactivator;

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
const STAFF_DOMAIN_WORDPRESS_PLUGIN_VERSION = '1.0.0';

/**
 * The code that runs during plugin activation.
 */
function activate_staff_domain_wordpress_plugin() {
    $activator = new Activator();
    $activator->run();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_staff_domain_wordpress_plugin() {
    $deactivator = new Deactivator();
    $deactivator->run();
}

register_activation_hook(__FILE__, 'activate_staff_domain_wordpress_plugin');
register_deactivation_hook(__FILE__, 'deactivate_staff_domain_wordpress_plugin');


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function staff_domain_wordpress_plugin_run() {
    $plugin = new Core();
    $plugin->run();
}

staff_domain_wordpress_plugin_run();
