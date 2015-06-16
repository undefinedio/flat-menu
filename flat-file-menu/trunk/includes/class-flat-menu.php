<?php
namespace Undefined;
/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @link       http://weareundefined.be
 * @since      0.0.1
 *
 * @package    Flat_Menu
 * @subpackage Flat_Menu/includes
 * @author     Vincent Peters <vincent@unde.fined.io>
 */
class FlatMenu
{
    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    0.0.1
     * @access   protected
     * @var      FlatMenuLoader $loader Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since    0.0.1
     * @access   protected
     * @var      string $Flat_Menu The string used to uniquely identify this plugin.
     */
    protected $Flat_Menu;

    /**
     * Static class for the parser
     *
     * @since    0.0.1
     * @access   static
     * @var
     */
    static $parser;

    /**
     * The current version of the plugin.
     *
     * @since    0.0.1
     * @access   protected
     * @var      string $version The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since    0.0.1
     */
    public function __construct()
    {

        $this->Flat_Menu = 'flat-file-menu';
        $this->version = '0.0.1';

        $this->loadDependencies();
    }

    /**
     * Returns the corresponding menu as an array
     *
     * @param $slug -  Menu slug
     * @param string $as - How to return the menu data
     * @return string
     *
     * @since    0.0.1
     * @access   public static
     */
    static public function get($slug, $as = 'array')
    {
        return Self::$parser->get($slug);
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Flat_Menu_Loader. Orchestrates the hooks of the plugin.
     * - Flat_Menu_i18n. Defines internationalization functionality.
     * - Flat_Menu_Admin. Defines all hooks for the admin area.
     * - Flat_Menu_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    0.0.1
     * @access   private
     */
    private function loadDependencies()
    {
        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-flat-menu-loader.php';

        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-flat-menu-parser.php';

        $this->loader = new FlatMenuLoader();
        Self::$parser = new FlatMenuParser();
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since    0.0.1
     */
    public function run()
    {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     0.0.1
     * @return    string    The name of the plugin.
     */
    public function getFlatMenu()
    {
        return $this->Flat_Menu;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     0.0.1
     * @return    FlatMenuLoader    Orchestrates the hooks of the plugin.
     */
    public function getLoader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     0.0.1
     * @return    string    The version number of the plugin.
     */
    public function getVersion()
    {
        return $this->version;
    }
}
