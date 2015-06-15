<?php
/**
 * Used as parser for controlling the menu data
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
class Flat_Menu_Json
{
    /**
     * This variables stores all the original menu data from json
     *
     * @since    0.0.1
     * @access   protected
     */
    protected $json_menus = [];

    /**
     * Constructor
     *
     * @since    0.0.1
     */
    public function __construct()
    {
        $this->fetchJsons();
    }

    /**
     * Loop all json files and fetch the json data form them and store them in this class
     *
     * @since    0.0.1
     */
    protected function fetchJsons()
    {
        foreach (glob(get_template_directory() . "/menu/*.json") as $filename) {
            $json = json_decode(file_get_contents($filename), true);
            $this->json_menus[ $json['name'] ] = $json['menu'];
        }
    }

    /**
     * Return the raw json data
     *
     * @return array
     * @since    0.0.1
     */
    public function get()
    {
        return $this->json_menus;
    }
}
