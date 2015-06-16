<?php
namespace Undefined\MultiLanguage;
/**
 * Ploylang engine for translations
 *
 * @since      0.0.1
 * @link       http://weareundefined.be
 *
 * @package    Flat_Menu
 * @subpackage Flat_Menu/includes
 * @author     Vincent Peters <vincent@unde.fined.io>
 */
class PolylangEngine implements EngineInterface
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
        return pll_get_post($id);
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
        return pll__($string);
    }

    /**
     * Returns the currently used language
     *
     * @return mixed
     */
    public function getLang()
    {
        return [
            'current' => pll_current_language(),
            'default' => pll_default_language()
        ];
    }
}
