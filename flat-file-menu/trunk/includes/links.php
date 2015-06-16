<?php
namespace Undefined;
/**
 * Define the links to the correct url's
 *
 * @since      0.0.1
 * @link       http://weareundefined.be
 *
 * @package    Flat_Menu
 * @subpackage Flat_Menu/includes
 * @author     Vincent Peters <vincent@unde.fined.io>
 */
class FlatMenuLinks
{
    protected $defaultType = "page";

    /**
     * Constructor
     *
     * @since    0.0.1
     */
    public function __construct()
    {
    }

    /**
     * Set the correct links for all menu items
     *
     * @since    0.0.1
     * @param $menus
     * @return mixed
     */
    public function set($menus)
    {
        foreach ($menus as $menuSlug => $menu) {
            foreach ($menu['menu'] as $key => $menuItem) {
                $menus[ $menuSlug ]['menu'][ $key ] = $this->setLinks($menus[ $menuSlug ]['menu'][ $key ], $menus[ $menuSlug ]['lang']);
            }
        }

        return $menus;
    }

    private function restoreDefaults($object)
    {
        if (isset($object['link'])) {
            $object['type'] = "custom";
        }

        if (!isset($object['type'])) {
            $object['type'] = $this->defaultType;
        }

        return $object;
    }

    /**
     * Set the correct url for all menu items
     *
     * @since    0.0.1
     * @param $object
     * @param $lang
     * @return mixed
     */
    private function setLinks($object, $lang)
    {
        $object = $this->restoreDefaults($object);

        switch ($object['type']) {
            case "page":
            case "post":
                $object = $this->setUrlById($object);
                break;
            case "home":
                $object = $this->setHomeUrl($object);
                break;
            case "archive":
                $object = $this->setArchiveUrl($object, $lang);
                break;
            default:
                break;
        }

        return $object;
    }

    /**
     * Set the Home url
     *
     * @since    0.0.1
     * @param $object
     * @return mixed
     */
    private function setHomeUrl($object)
    {
        $object['link'] = get_home_url();

        return $object;
    }

    /**
     * Set the link of an post or page by ID
     *
     * @since    0.0.1
     * @param $object
     * @return mixed
     */
    private function setUrlById($object)
    {
        if ($object['id']) {
            $object['link'] = get_permalink($object['id']);
        }

        return $object;
    }

    /**
     * Set url of an archive page
     *
     * @since    0.0.1
     * @param $object
     * @param $lang
     * @return mixed
     */
    private function setArchiveUrl($object, $lang)
    {
        if ($object['slug']) {
            if ($lang['current'] == $lang['default']) {
                $object['link'] = '/' . $object['slug'] . '/';
            } else {
                $object['link'] = '/' . $lang['current'] . '/' . $object['slug'] . '/';
            }
        }

        return $object;
    }
}
