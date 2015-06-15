<?php
namespace Undefined;

use Undefined\MultiLanguage\PolylangEngine;
use Undefined\MultiLanguage\Wpml;
use Undefined\MultiLanguage\Polylang;

/**
 * Used to return language correct parameters
 *
 * @since      0.0.1
 * @link       http://weareundefined.be
 *
 * @package    Flat_Menu
 * @subpackage Flat_Menu/includes
 * @author     Vincent Peters <vincent@unde.fined.io>
 */
class FlatMenuMultilanguage
{
    protected $defaultType = 'page';
    private $engine;

    /**
     * Constructor
     *
     * @since    0.0.1
     */
    public function __construct()
    {
        $this->CheckEngine();
    }

    /**
     * Convert the menu in correct text domain strings and the correct object ID's
     *
     * @param $menus
     * @return mixed
     * @since    0.0.1
     */
    public function traslate($menus)
    {
        if (!$this->engine) {
            return $menus;
        }

        $menus = $this->convertParameters($menus);

        return $menus;
    }

    /**
     * Convert the specific parameters to the language correct ones
     *
     * @param $menus
     * @return mixed
     * @since    0.0.1
     */
    private function convertParameters($menus)
    {
        foreach ($menus as $menuSlug => $menu) {
            foreach ($menu as $key => $menuItem) {
                $menus[ $menuSlug ][ $key ] = $this->setId($menus[ $menuSlug ][ $key ]);
                $menus[ $menuSlug ][ $key ] = $this->setString($menus[ $menuSlug ][ $key ]);
            }
        }

        return $menus;
    }

    /**
     * Get the language specific ID
     *
     * @param $object
     * @return mixed
     * @since    0.0.1
     */
    private function setId($object)
    {
        if (!isset($object['type'])) {
            $object['type'] = $this->defaultType;
        }

        if (isset($object['id'])) {
            $object['id'] = $this->engine->getId($object['id']);
        }

        return $object;
    }

    /**
     * Set the correct language specific string
     *
     * @param $object
     * @return mixed
     * @since    0.0.1
     */
    private function setString($object)
    {
        if (isset($object['title'])) {
            $object['title'] = $this->engine->getString($object['title']);
        }

        return $object;
    }

    /**
     * Check witch multilanguage engine (Wordpress plugin)  is used
     *
     * @since    0.0.1
     */
    private function CheckEngine()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/MultiLanguage/EngineInterface.php';

        if (function_exists('pll_get_post')) {
            require_once plugin_dir_path(dirname(__FILE__)) . 'includes/MultiLanguage/PolylangEngine.php';
            $this->engine = new PolylangEngine();
        } else if (function_exists('icl_object_id')) {
            require_once plugin_dir_path(dirname(__FILE__)) . 'includes/MultiLanguage/Wpml.php';
            $this->engine = new Wpml();
        } else {
            $this->engine = false;
        }
    }
}
