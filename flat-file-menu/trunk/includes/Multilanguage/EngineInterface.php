<?php
namespace Undefined\MultiLanguage;
/**
 * Translation Engine Interface
 *
 * @link       http://weareundefined.be
 * @since      0.0.1
 *
 * Interface EngineInterface
 * @package Undefined\MultiLanguage
 */
interface EngineInterface
{
    public function getId($id, $type);

    public function getString($string);

    public function getLang();
}