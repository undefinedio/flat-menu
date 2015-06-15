<?php

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.0.1
 * @package    Flat_Menu
 * @subpackage Flat_Menu/includes
 * @author     Vincent Peters <vincent@unde.fined.io>
 */
class Flat_Menu
{

    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since    0.0.1
     * @access   protected
     * @var      Flat_Menu_Loader $loader Maintains and registers all hooks for the plugin.
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

        $this->load_dependencies();
        $this->set_locale();
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
    static function get($slug, $as = 'array')
    {
        return $slug;
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
    private function load_dependencies()
    {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-flat-menu-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-flat-menu-i18n.php';

        $this->loader = new Flat_Menu_Loader();
    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Flat_Menu_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    0.0.1
     * @access   private
     */
    private function set_locale()
    {

        $plugin_i18n = new Flat_Menu_i18n();
        $plugin_i18n->set_domain($this->get_Flat_Menu());

        $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
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
    public function get_Flat_Menu()
    {
        return $this->Flat_Menu;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since     0.0.1
     * @return    Flat_Menu_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     0.0.1
     * @return    string    The version number of the plugin.
     */
    public function get_version()
    {
        return $this->version;
    }
}
