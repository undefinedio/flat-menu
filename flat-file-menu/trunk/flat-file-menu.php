<?php
namespace Undefined;

    /**
     * The Flat File Menu Wordpress Solution
     *
     * @link              http://weareundefined.be
     * @since             0.0.1
     * @package           Flat_Menu
     *
     * @wordpress-plugin
     * Plugin Name:       Flat File Menu
     * Plugin URI:        http://weareundefined.be
     * Description:       A flat file solution for Wordpress Menu's
     * Version:           0.0.1
     * Author:            Undefined
     * Author URI:        http://weareundefined.be
     * License:           GPL-2.0+
     * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
     * Text Domain:       undefined
     * Domain Path:       /languages
     */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_Flat_Menu()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-flat-menu-activator.php';
    FlatMenuActivator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_Flat_Menu()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-flat-menu-deactivator.php';
    FlatMenuDeactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_Flat_Menu');
register_deactivation_hook(__FILE__, 'deactivate_Flat_Menu');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-flat-menu.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.0.1
 */
function run_Flat_Menu()
{
    $plugin = new FlatMenu();
    $plugin->run();
}

run_Flat_Menu();

if (!function_exists('dd')) {
    /**
     * Debug Function
     *
     * @param $var
     */
    function dd($var)
    {
        echo "<pre>";
        var_dump($var);
        die();
    }
}