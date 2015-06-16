<?php
namespace Undefined\MultiLanguage;
/**
 * WPML engine for translations
 *
 * @since      0.0.1
 * @link       http://weareundefined.be
 *
 * @package    Flat_Menu
 * @subpackage Flat_Menu/includes
 * @author     Vincent Peters <vincent@unde.fined.io>
 */
class Wpml implements EngineInterface
{

    /**
     * Returns the ID in the correct language
     *
     * @param $id
     * @param string $type
     * @return mixed
     * @since      0.0.1
     */
    public function getId($id, $type = 'page')
    {
        return icl_object_id($id, $type);
    }

    /**
     * Returns the string in the correct language
     *
     * @param string $string
     * @return mixed
     * @since      0.0.1
     */
    public function getString($string)
    {
        return __($string);
    }

    /**
     * Returns the currently used language
     *
     * @return mixed
     */
    public function getLang()
    {
        global $sitepress;

        return [
            'current' => ICL_LANGUAGE_CODE,
            'default' => $sitepress->get_default_language()
        ];
    }
}
