<?php
namespace Undefined;

use Undefined\MultiLanguage\FlatMenuMultilanguage;

/**
 * Define the json functionality
 *
 * @since      0.0.1
 * @link       http://weareundefined.be
 *
 * @package    Flat_Menu
 * @subpackage Flat_Menu/includes
 * @author     Vincent Peters <vincent@unde.fined.io>
 */
class FlatMenuParser
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
     * Stores the language class
     *
     * @since    0.0.1
     * @access   protected
     */
    protected $language;

    /**
     * Constructor
     *
     * @since    0.0.1
     */
    public function __construct()
    {
        $this->loadDependencies();

        add_action('init', [$this, 'fetchMenu']);
    }

    public function fetchMenu()
    {
        $this->getJson();
        $this->translate();
        $this->setLinks();
    }

    /**
     * Require all dependencies
     *
     * @since    0.0.1
     */
    private function loadDependencies()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/json.php';
        $this->json = new FlatMenuJson();

        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/links.php';
        $this->links = new FlatMenuLinks();

        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/multilanguage/multilanguage.php';
        $this->language = new FlatMenuMultilanguage();
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
     * Get the raw json data from teh files
     *
     * @since    0.0.1
     */
    private function setLinks()
    {
        $this->menus = $this->links->set($this->menus);
    }

    /**
     * Get the raw json data from teh files
     *
     * @since    0.0.1
     */
    private function translate()
    {
        $this->menus = $this->language->traslate($this->menus);
    }

    /**
     * Return the requested menu data
     *
     * @param   $slug
     * @return  mixed
     * @since    0.0.1
     */
    public function get($slug)
    {
        if (isset($this->menus[ $slug ])) {
            return $this->menus[ $slug ]['menu'];
        } else {
            return false;
        }
    }
}
