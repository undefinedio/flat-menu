<?php
/**
 * Define the json functionality
 *
 * @link       http://weareundefined.be
 * @since      0.0.1
 *
 * @package    Flat_Menu
 * @subpackage Flat_Menu/includes
 */

/**
 * Define the json functionality
 *
 * @since      0.0.1
 * @package    Flat_Menu
 * @subpackage Flat_Menu/includes
 * @author     Vincent Peters <vincent@unde.fined.io>
 */
class Flat_Menu_Parser
{
    /**
     * This variables stores all menu's
     *
     * @since    0.0.1
     * @access   protected
     */
    protected $menus = [];

    /**
     * Stores the parser class
     *
     * @since    0.0.1
     * @access   protected
     */
    protected $json;

    /**
     * Constructor
     *
     * @since    0.0.1
     */
    public function __construct()
    {
        $this->load_dependencies();
        $this->getJson();
    }

    /**
     * Require all dependencies
     *
     * @since    0.0.1
     */
    private function load_dependencies()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-flat-menu-json.php';
        $this->json = new Flat_Menu_Json();
    }

    /**
     * Get the raw json data from teh files
     *
     * @since    0.0.1
     */
    private function getJson()
    {
        $this->menus = $this->json->get();
    }

    /**
     * Return the requested menu data
     *
     * @param   $slug
     * @return  bool / array
     * @since    0.0.1
     */
    public function get($slug)
    {
        if (isset($this->menus[ $slug ])) {
            return $this->menus[ $slug ];
        } else {
            return false;
        }
    }
}
